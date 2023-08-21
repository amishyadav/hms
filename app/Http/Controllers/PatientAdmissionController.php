<?php

namespace App\Http\Controllers;

use App\Exports\PatientAdmissionExport;
use App\Http\Requests\CreatePatientAdmissionRequest;
use App\Http\Requests\UpdatePatientAdmissionRequest;
use App\Models\Bill;
use App\Models\Patient;
use App\Models\PatientAdmission;
use App\Repositories\PatientAdmissionRepository;
use Carbon\Carbon;
use Exception;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PatientAdmissionController extends AppBaseController
{
    /** @var PatientAdmissionRepository */
    private $patientAdmissionRepository;

    public function __construct(PatientAdmissionRepository $patientAdmissionRepo)
    {
        $this->patientAdmissionRepository = $patientAdmissionRepo;
    }

    /**
     * Display a listing of the PatientAdmission.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $data['statusArr'] = PatientAdmission::STATUS_ARR;

        return view('patient_admissions.index', $data);
    }

    /**
     * Show the form for creating a new PatientAdmission.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data = $this->patientAdmissionRepository->getSyncList();

        return view('patient_admissions.create', compact('data'));
    }

    /**
     * Store a newly created PatientAdmission in storage.
     *
     * @param  CreatePatientAdmissionRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreatePatientAdmissionRequest $request)
    {
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        $patientId = Patient::with('patientUser')->whereId($input['patient_id'])->first();
        $birthDate = $patientId->user->dob;
        $admissionDate = Carbon::parse($input['admission_date'])->toDateString();
        if (! empty($birthDate) && $admissionDate < $birthDate) {
            Flash::error( __('messages.flash.admission_date_smaller'));

            return redirect()->back()->withInput($input);
        }

        $this->patientAdmissionRepository->store($input);

        Flash::success( __('messages.flash.patient_admission_saved'));

        return redirect(route('patient-admissions.index'));
    }

    /**
     * Display the specified PatientAdmission.
     *
     * @param  int  $id
     *
     * @return Factory|View
     */
    public function show($id)
    {
        $patientAdmission = PatientAdmission::findOrFail($id);

        return view('patient_admissions.show')->with('patientAdmission', $patientAdmission);
    }

    /**
     * Show the form for editing the specified PatientAdmission.
     *
     * @param  int  $id
     *
     * @return Factory|View
     */
    public function edit($id)
    {
        $patientAdmission = PatientAdmission::findOrFail($id);
        $data = $this->patientAdmissionRepository->getSyncList($patientAdmission);
        $data['patientAdmissionDate'] = PatientAdmission::whereId($patientAdmission->id)->with('patient',
            function ($q) {
                $q->with('user');
            })->first();

        return view('patient_admissions.edit', compact('data', 'patientAdmission'));
    }

    /**
     * Update the specified PatientAdmission in storage.
     *
     * @param  PatientAdmission  $patientAdmission
     * @param  UpdatePatientAdmissionRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update(PatientAdmission $patientAdmission, UpdatePatientAdmissionRequest $request)
    {
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        $patientId = Patient::with('patientUser')->whereId($patientAdmission->patient_id)->first();
        $birthDate = $patientId->patientUser->dob;
        $admissionDate = Carbon::parse($input['admission_date'])->toDateString();
        if (! empty($birthDate) && $admissionDate < $birthDate) {
            Flash::error( __('messages.flash.admission_date_smaller'));

            return redirect()->back()->withInput($input);
        }
        $this->patientAdmissionRepository->update($input, $patientAdmission);

        Flash::success( __('messages.flash.patient_admission_updated'));

        return redirect(route('patient-admissions.index'));
    }

    /**
     * Remove the specified PatientAdmission from storage.
     *
     * @param  PatientAdmission  $patientAdmission
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(PatientAdmission $patientAdmission)
    {
        $patientAdmissionModel = [
            Bill::class,
        ];
        $result = canDelete($patientAdmissionModel, 'patient_admission_id', $patientAdmission->patient_admission_id);
        if ($result) {
            return $this->sendError( __('messages.flash.patient_admission_cant_deleted'));
        }

        if (! empty($patientAdmission->bed_id)) {
            $this->patientAdmissionRepository->setBedAvailable($patientAdmission->bed_id);
        }
        $this->patientAdmissionRepository->delete($patientAdmission->id);

        return $this->sendSuccess( __('messages.flash.patient_admission_deleted'));
    }

    /**
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function activeDeactiveStatus($id)
    {
        $patientAdmission = PatientAdmission::findOrFail($id);
        $status = ! $patientAdmission->status;
        $patientAdmission->update(['status' => $status]);

        return $this->sendSuccess(__('messages.common.status_updated_successfully'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function patientAdmissionExport()
    {
        $response = Excel::download(new PatientAdmissionExport, 'patient-admissions-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }

    /**
     * @param  PatientAdmission  $patientAdmission
     *
     * @return JsonResponse
     */
    public function showModal(PatientAdmission $patientAdmission)
    {
        $patientAdmission->load(['patient.patientUser', 'doctor.doctorUser', 'package', 'insurance', 'bed']);
        $patientAdmission['admission_date'] = date('jS M,Y g:i A', strtotime($patientAdmission->admission_date));

        return $this->sendResponse($patientAdmission,  __('messages.flash.patient_admission_retrieved'));
    }
}
