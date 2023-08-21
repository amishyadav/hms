<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIpdPrescriptionRequest;
use App\Http\Requests\UpdateIpdPrescriptionRequest;
use App\Models\IpdPrescription;
use App\Repositories\IpdPrescriptionRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;
use Throwable;

class IpdPrescriptionController extends AppBaseController
{
    /** @var IpdPrescriptionRepository */
    private $ipdPrescriptionRepository;

    public function __construct(IpdPrescriptionRepository $ipdPrescriptionRepo)
    {
        $this->ipdPrescriptionRepository = $ipdPrescriptionRepo;
    }

    /**
     * Display a listing of the IpdPrescription.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Store a newly created IpdPrescription in storage.
     *
     * @param  CreateIpdPrescriptionRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateIpdPrescriptionRequest $request)
    {
        $input = $request->all();
        $this->ipdPrescriptionRepository->store($input);
        $this->ipdPrescriptionRepository->createNotification($input);

        return $this->sendSuccess( __('messages.flash.IPD_Prescription_saved'));
    }

    /**
     * Display the specified IPD Prescription.
     *
     * @param  IpdPrescription  $ipdPrescription
     *
     * @throws Throwable
     *
     * @return array|string
     */
    public function show(IpdPrescription $ipdPrescription)
    {
        return view('ipd_prescriptions.show_ipd_prescription_data', compact('ipdPrescription'))->render();
    }

    /**
     * Show the form for editing the specified IpdPrescription.
     *
     * @param  IpdPrescription  $ipdPrescription
     *
     * @return JsonResponse
     */
    public function edit(IpdPrescription $ipdPrescription)
    {
        $ipdPrescriptionData = $this->ipdPrescriptionRepository->getIpdPrescriptionData($ipdPrescription);

        return $this->sendResponse($ipdPrescriptionData,  __('messages.flash.IPD_Prescription_retrieved'));
    }

    /**
     * Update the specified IpdPrescriptionItem in storage.
     *
     * @param  IpdPrescription  $ipdPrescription
     * @param  UpdateIpdPrescriptionRequest  $request
     *
     * @return JsonResponse
     */
    public function update(IpdPrescription $ipdPrescription, UpdateIpdPrescriptionRequest $request)
    {
        $this->ipdPrescriptionRepository->updateIpdPrescriptionItems($request->all(), $ipdPrescription);

        return $this->sendSuccess( __('messages.flash.IPD_Prescription_updated'));
    }

    /**
     * Remove the specified IpdPrescriptionItem from storage.
     *
     * @param  IpdPrescription  $ipdPrescription
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(IpdPrescription $ipdPrescription)
    {
        $ipdPrescription->ipdPrescriptionItems()->delete();
        $ipdPrescription->delete();

        return $this->sendSuccess( __('messages.flash.IPD_Prescription_deleted'));
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function getMedicineList(Request $request)
    {
        $chargeCategories = $this->ipdPrescriptionRepository->getMedicines($request->get('id'));

        return $this->sendResponse($chargeCategories, __('messages.flash.retrieve'));
    }
}
