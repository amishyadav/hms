<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeathReportRequest;
use App\Http\Requests\UpdateDeathReportRequest;
use App\Models\DeathReport;
use App\Models\PatientCase;
use App\Repositories\DeathReportRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeathReportController extends AppBaseController
{
    /** @var DeathReportRepository */
    private $deathReportRepository;

    public function __construct(DeathReportRepository $deathReportRepo)
    {
        $this->middleware('check_menu_access');
        $this->deathReportRepository = $deathReportRepo;
    }

    /**
     * Display a listing of the DeathReport.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $cases = $this->deathReportRepository->getCases();
        $doctors = $this->deathReportRepository->getDoctors();

        return view('death_reports.index', compact('cases', 'doctors'));
    }

    /**
     * Store a newly created DeathReport in storage.
     *
     * @param  CreateDeathReportRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateDeathReportRequest $request)
    {
        $input = $request->all();
        $input['date'] = Carbon::parse($input['date'])->format('Y-m-d H:i:s');
        $patientId = PatientCase::with('patient.patientUser')->whereCaseId($input['case_id'])->first();
        $birthDate = $patientId->patient->patientUser->dob;
        $deathDate = Carbon::parse($input['date'])->toDateString();
        if (! empty($birthDate) && $deathDate < $birthDate) {
            return $this->sendError( __('messages.flash.date_smaller'));
        }
        $deathReport = $this->deathReportRepository->store($input);

        return $this->sendSuccess( __('messages.flash.death_report_saved'));
    }

    /**
     * Display the specified DeathReport.
     *
     * @param  DeathReport  $deathReport
     *
     * @return Factory|View
     */
    public function show(DeathReport $deathReport)
    {
        $cases = $this->deathReportRepository->getCases();
        $doctors = $this->deathReportRepository->getDoctors();

        return view('death_reports.show')->with([
            'deathReport' => $deathReport, 'cases' => $cases, 'doctors' => $doctors,
        ]);
    }

    /**
     * Show the form for editing the specified DeathReport.
     *
     * @param  DeathReport  $deathReport
     *
     * @return JsonResponse
     */
    public function edit(DeathReport $deathReport)
    {
        return $this->sendResponse($deathReport, __('messages.flash.death_report_retrieved'));
    }

    /**
     * Update the specified DeathReport in storage.
     *
     * @param  DeathReport  $deathReport
     * @param  UpdateDeathReportRequest  $request
     *
     * @return JsonResponse
     */
    public function update(DeathReport $deathReport, UpdateDeathReportRequest $request)
    {
        $input = $request->all();
        $patientId = PatientCase::with('patient.patientUser')->whereCaseId($input['case_id'])->first();
        $birthDate = $patientId->patient->patientUser->dob;
        $deathDate = Carbon::parse($input['date'])->toDateString();
        if (! empty($birthDate) && $deathDate < $birthDate) {
            return $this->sendError( __('messages.flash.date_smaller'));
        }

        $deathReport = $this->deathReportRepository->update($request->all(), $deathReport);

        return $this->sendSuccess( __('messages.flash.death_report_updated'));
    }

    /**
     * Remove the specified DeathReport from storage.
     *
     * @param  DeathReport  $deathReport
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(DeathReport $deathReport)
    {
        $this->deathReportRepository->delete($deathReport->id);

        return $this->sendSuccess( __('messages.flash.death_report_deleted'));
    }
}
