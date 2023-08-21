<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIpdDiagnosisRequest;
use App\Http\Requests\UpdateIpdDiagnosisRequest;
use App\Models\IpdDiagnosis;
use App\Repositories\IpdDiagnosisRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class IpdDiagnosisController extends AppBaseController
{
    /** @var IpdDiagnosisRepository */
    private $ipdDiagnosisRepository;

    public function __construct(IpdDiagnosisRepository $ipdDiagnosisRepo)
    {
        $this->ipdDiagnosisRepository = $ipdDiagnosisRepo;
    }

    /**
     * Display a listing of the IpdDiagnosis.
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
     * Store a newly created IpdDiagnosis in storage.
     *
     * @param  CreateIpdDiagnosisRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateIpdDiagnosisRequest $request)
    {
        $input = $request->all();
        $this->ipdDiagnosisRepository->store($input);

        return $this->sendSuccess( __('messages.flash.IPD_diagnosis_saved'));
    }

    /**
     * Show the form for editing the specified Ipd Diagnosis.
     *
     * @param  IpdDiagnosis  $ipdDiagnosis
     *
     * @return JsonResponse
     */
    public function edit(IpdDiagnosis $ipdDiagnosis)
    {
        return $this->sendResponse($ipdDiagnosis,  __('messages.flash.IPD_diagnosis_retrieved'));
    }

    /**
     * Update the specified Ipd Diagnosis in storage.
     *
     * @param  IpdDiagnosis  $ipdDiagnosis
     *
     * @param  UpdateIpdDiagnosisRequest  $request
     *
     * @return JsonResponse
     */
    public function update(IpdDiagnosis $ipdDiagnosis, UpdateIpdDiagnosisRequest $request)
    {
        $this->ipdDiagnosisRepository->updateIpdDiagnosis($request->all(), $ipdDiagnosis->id);

        return $this->sendSuccess( __('messages.flash.IPD_diagnosis_updated'));
    }

    /**
     * Remove the specified IpdDiagnosis from storage.
     *
     * @param  IpdDiagnosis  $ipdDiagnosis
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(IpdDiagnosis $ipdDiagnosis)
    {
        $this->ipdDiagnosisRepository->deleteIpdDiagnosis($ipdDiagnosis->id);

        return $this->sendSuccess( __('messages.flash.IPD_diagnosis_deleted'));
    }

    /**
     * @param  IpdDiagnosis  $ipdDiagnosis
     *
     *
     * @return Media
     */
    public function downloadMedia(IpdDiagnosis $ipdDiagnosis)
    {
        $media = $ipdDiagnosis->getMedia(IpdDiagnosis::IPD_DIAGNOSIS_PATH)->first();
        if ($media != null) {
            $media = $media->id;
            $mediaItem = Media::findOrFail($media);

            return $mediaItem;
        }

        return '';
    }
}
