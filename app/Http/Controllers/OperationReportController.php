<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOperationReportRequest;
use App\Http\Requests\UpdateOperationReportRequest;
use App\Models\OperationReport;
use App\Models\PatientCase;
use App\Repositories\OperationReportRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class OperationReportController extends AppBaseController
{
    /** @var OperationReportRepository */
    private $operationReportRepository;

    public function __construct(OperationReportRepository $operationReportRepo)
    {
        $this->middleware('check_menu_access');
        $this->operationReportRepository = $operationReportRepo;
    }

    /**
     * Display a listing of the OperationReport.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $doctors = $this->operationReportRepository->getDoctors();
        $cases = $this->operationReportRepository->getCases();

        return view('operation_reports.index', compact('doctors', 'cases'));
    }

    /**
     * Store a newly created OperationReport in storage.
     *
     * @param  CreateOperationReportRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateOperationReportRequest $request)
    {
        $input = $request->all();
        $patientId = PatientCase::with('patient.patientUser')->whereCaseId($input['case_id'])->first();
        $birthDate = $patientId->patient->patientUser->dob;
        $operationDate = Carbon::parse($input['date'])->toDateString();
        if (! empty($birthDate) && $operationDate < $birthDate) {
            return $this->sendError( __('messages.flash.date_smaller'));
        }
        $this->operationReportRepository->store($input);

        return $this->sendSuccess( __('messages.flash.operation_report_saved'));
    }

    /**
     * @param  OperationReport  $operationReport
     *
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function show(OperationReport $operationReport)
    {
        $doctors = $this->operationReportRepository->getDoctors();
        $cases = $this->operationReportRepository->getCases();

        return view('operation_reports.show')->with([
            'operationReport' => $operationReport, 'doctors' => $doctors, 'cases' => $cases,
        ]);
    }

    /**
     * Show the form for editing the specified OperationReport.
     *
     * @param  OperationReport  $operationReport
     *
     * @return JsonResponse
     */
    public function edit(OperationReport $operationReport)
    {
        return $this->sendResponse($operationReport,  __('messages.flash.operation_report_retrieved'));
    }

    /**
     * Update the specified OperationReport in storage.
     *
     * @param  OperationReport  $operationReport
     * @param  UpdateOperationReportRequest  $request
     *
     * @return JsonResponse
     */
    public function update(OperationReport $operationReport, UpdateOperationReportRequest $request)
    {
        $input = $request->all();
        $patientId = PatientCase::with('patient.patientUser')->whereCaseId($input['case_id'])->first();
        $birthDate = $patientId->patient->patientUser->dob;
        $operationDate = Carbon::parse($input['date'])->toDateString();
        if (! empty($birthDate) && $operationDate < $birthDate) {
            return $this->sendError( __('messages.flash.date_smaller'));
        }
        $this->operationReportRepository->update($input, $operationReport);

        return $this->sendSuccess( __('messages.flash.operation_report_updated'));
    }

    /**
     * Remove the specified OperationReport from storage.
     *
     * @param  OperationReport  $operationReport
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(OperationReport $operationReport)
    {
        $operationReport->delete();

        return $this->sendSuccess( __('messages.flash.operation_report_deleted'));
    }
}
