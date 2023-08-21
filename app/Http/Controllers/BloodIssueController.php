<?php

namespace App\Http\Controllers;

use App\Exports\BloodIssueExport;
use App\Http\Requests\BloodIssueRequest;
use App\Models\BloodDonor;
use App\Models\BloodIssue;
use App\Repositories\BloodIssueRepository;
use App\Repositories\PatientCaseRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class BloodIssueController
 */
class BloodIssueController extends AppBaseController
{
    /** @var BloodIssueRepository */
    private $bloodIssueRepository;
    /** @var PatientCaseRepository */
    private $patientCaseRepository;

    /**
     * BloodIssueController constructor.
     * @param  BloodIssueRepository  $bloodIssueRepository
     * @param  PatientCaseRepository  $patientCaseRepository
     */
    public function __construct(
        BloodIssueRepository $bloodIssueRepository,
        PatientCaseRepository $patientCaseRepository
    ) {
        $this->middleware('check_menu_access');
        $this->bloodIssueRepository = $bloodIssueRepository;
        $this->patientCaseRepository = $patientCaseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $doctors = $this->patientCaseRepository->getDoctors();
        $patients = $this->patientCaseRepository->getPatients();
        $donors = BloodDonor::orderBy('name')->pluck('name', 'id');

        return view('blood_issues.index', compact('doctors', 'patients', 'donors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BloodIssueRequest  $request
     *
     * @return JsonResponse
     */
    public function store(BloodIssueRequest $request)
    {
        try {
            $input = $request->all();
            $input['amount'] = removeCommaFromNumbers($input['amount']);
            $this->bloodIssueRepository->create($input);

            return $this->sendSuccess( __('messages.flash.blood_issue_saved'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function getBloodGroup(Request $request)
    {
        try {
            $bloodGroup = $this->bloodIssueRepository->getBloodGroup($request->get('id'));

            return $this->sendResponse($bloodGroup, __('messages.flash.blood_group_retrieved'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  BloodIssue  $bloodIssue
     *
     * @return JsonResponse
     */
    public function edit(BloodIssue $bloodIssue)
    {
        return $this->sendResponse($bloodIssue, __('messages.flash.blood_issue_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BloodIssueRequest  $request
     * @param  BloodIssue  $bloodIssue
     *
     * @return JsonResponse
     */
    public function update(BloodIssueRequest $request, BloodIssue $bloodIssue)
    {
        try {
            $input = $request->all();
            $input['amount'] = removeCommaFromNumbers($input['amount']);
            $this->bloodIssueRepository->update($input, $bloodIssue->id);

            return $this->sendSuccess(__('messages.flash.blood_issue_updated'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BloodIssue  $bloodIssue
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(BloodIssue $bloodIssue)
    {
        try {
            $bloodIssue->delete();

            return $this->sendSuccess(__('messages.flash.blood_issue_deleted'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * @return BinaryFileResponse
     */
    public function export()
    {
        $response = Excel::download(new BloodIssueExport, 'blood-issue-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }
}
