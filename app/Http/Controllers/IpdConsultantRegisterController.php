<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIpdConsultantRegisterRequest;
use App\Http\Requests\UpdateIpdConsultantRegisterRequest;
use App\Models\IpdConsultantRegister;
use App\Repositories\IpdConsultantRegisterRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;

class IpdConsultantRegisterController extends AppBaseController
{
    /** @var IpdConsultantRegisterRepository */
    private $ipdConsultantRegisterRepository;

    public function __construct(IpdConsultantRegisterRepository $ipdConsultantRegisterRepo)
    {
        $this->ipdConsultantRegisterRepository = $ipdConsultantRegisterRepo;
    }

    /**
     * Display a listing of the IpdConsultantRegister.
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
     * Store a newly created IpdConsultantRegister in storage.
     *
     * @param  CreateIpdConsultantRegisterRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateIpdConsultantRegisterRequest $request)
    {
        $input = $request->all();
        $this->ipdConsultantRegisterRepository->store($input);

        return $this->sendSuccess( __('messages.flash.IPD_consultant_saved'));
    }

    /**
     * Show the form for editing the specified IpdPrescription.
     *
     * @param  IpdConsultantRegister  $ipdConsultantRegister
     *
     * @return JsonResponse
     */
    public function edit(IpdConsultantRegister $ipdConsultantRegister)
    {
        return $this->sendResponse($ipdConsultantRegister,  __('messages.flash.IPD_consultant_retrieved'));
    }

    /**
     * Update the specified IpdPrescriptionItem in storage.
     *
     * @param  IpdConsultantRegister  $ipdConsultantRegister
     * @param  UpdateIpdConsultantRegisterRequest  $request
     *
     * @return JsonResponse
     */
    public function update(IpdConsultantRegister $ipdConsultantRegister, UpdateIpdConsultantRegisterRequest $request)
    {
        $input = $request->all();
        $this->ipdConsultantRegisterRepository->update($input, $ipdConsultantRegister->id);

        return $this->sendSuccess( __('messages.flash.IPD_consultant_updated'));
    }

    /**
     * Remove the specified IpdConsultantRegister from storage.
     *
     * @param  IpdConsultantRegister  $ipdConsultantRegister
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(IpdConsultantRegister $ipdConsultantRegister)
    {
        $ipdConsultantRegister->delete();

        return $this->sendSuccess( __('messages.flash.IPD_consultant_deleted'));
    }
}
