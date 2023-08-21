<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBirthReportRequest;
use App\Http\Requests\UpdateBirthReportRequest;
use App\Models\BirthReport;
use App\Models\DeathReport;
use App\Models\PatientCase;
use App\Repositories\BirthReportRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BirthReportController extends AppBaseController
{
    /** @var BirthReportRepository */
    private $birthReportRepository;

    public function __construct(BirthReportRepository $birthReportRepo)
    {
        $this->middleware('check_menu_access');
        $this->birthReportRepository = $birthReportRepo;
    }

    /**
     * Display a listing of the BirthReport.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $cases = $this->birthReportRepository->getCases();
        $doctors = $this->birthReportRepository->getDoctors();

        return view('birth_reports.index', compact('cases', 'doctors'));
    }

    /**
     * Store a newly created BirthReport in storage.
     *
     * @param  CreateBirthReportRequest  $request
     *
     * @return JsonResponse|Redirector
     */
    public function store(CreateBirthReportRequest $request)
    {
        $input = $request->all();
        $input['date'] = Carbon::parse($input['date'])->format('Y-m-d H:i:s');
        $patientId = PatientCase::with('patient.user')->whereCaseId($input['case_id'])->first();
        $birthDate = $patientId->patient->user->dob;
        $selectBirthDate = Carbon::parse($input['date'])->toDateString();
        if (! empty($birthDate) && $selectBirthDate < $birthDate) {
            return $this->sendError( __('messages.flash.date_smaller'));
        }

        $isUserHasDead = DeathReport::whereCaseId($input['case_id'])->first();
        if (! empty($isUserHasDead)) {
            return $this->sendError( __('messages.flash.cant_create'));
        }
        $birthReport = $this->birthReportRepository->store($input);

        return $this->sendSuccess( __('messages.flash.birth_report_saved'));
    }

    /**
     * Display the specified BirthReport.
     *
     * @param  BirthReport  $birthReport
     *
     * @return Factory|View
     */
    public function show(BirthReport $birthReport)
    {
        $cases = $this->birthReportRepository->getCases();
        $doctors = $this->birthReportRepository->getDoctors();

        return view('birth_reports.show')->with([
            'birthReport' => $birthReport, 'cases' => $cases, 'doctors' => $doctors,
        ]);
    }

    /**
     * Show the form for editing the specified BirthReport.
     *
     * @param  BirthReport  $birthReport
     *
     * @return JsonResponse
     */
    public function edit(BirthReport $birthReport)
    {
        return $this->sendResponse($birthReport, __('messages.flash.birth_report_retrieved'));
    }

    /**
     * Update the specified BirthReport in storage.
     *
     * @param  BirthReport  $birthReport
     * @param  UpdateBirthReportRequest  $request
     *
     * @return JsonResponse
     */
    public function update(BirthReport $birthReport, UpdateBirthReportRequest $request)
    {
        $input = $request->all();
        $patientId = PatientCase::with('patient.user')->whereCaseId($input['case_id'])->first();
        $birthDate = $patientId->patient->user->dob;
        $selectBirthDate = Carbon::parse($input['date'])->toDateString();
        if (! empty($birthDate) && $selectBirthDate < $birthDate) {
            return $this->sendError( __('messages.flash.date_smaller'));
        }
        $birthReport = $this->birthReportRepository->update($request->all(), $birthReport);

        return $this->sendSuccess( __('messages.flash.date_smaller'));
    }

    /**
     * Remove the specified BirthReport from storage.
     *
     * @param  BirthReport  $birthReport
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(BirthReport $birthReport)
    {
        $this->birthReportRepository->delete($birthReport->id);

        return $this->sendSuccess( __('messages.flash.birth_report_deleted'));
    }
}
