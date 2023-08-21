<?php

namespace App\Http\Controllers;

use App\Exports\BedExport;
use App\Http\Requests\CreateBedRequest;
use App\Http\Requests\CreateBulkBedRequest;
use App\Http\Requests\UpdateBedRequest;
use App\Models\Bed;
use App\Models\BedAssign;
use App\Models\IpdPatientDepartment;
use App\Repositories\BedRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BedController extends AppBaseController
{
    /** @var BedRepository */
    private $bedRepository;

    public function __construct(BedRepository $bedRepo)
    {
        $this->bedRepository = $bedRepo;
    }

    /**
     * Display a listing of the Bed.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {

        $data['statusArr'] = Bed::STATUS_ARR;

        $bedTypes = $this->bedRepository->getBedTypes();

        return view('beds.index', compact('bedTypes'), $data);
    }

    /**
     * Store a newly created Bed in storage.
     *
     * @param  CreateBedRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateBedRequest $request)
    {
        $input = $request->all();
        $input['charge'] = removeCommaFromNumbers($input['charge']);

        $bed = $this->bedRepository->store($input);

        return $this->sendSuccess( __('messages.flash.bed_saved'));
    }

    /**
     * Display the specified Bed.
     *
     * @param  Bed  $bed
     *
     * @return Factory|View
     */
    public function show(Bed $bed)
    {
        $bedAssigns = $bed->bedAssigns()->orderBy('created_at', 'desc')->get();
        $bedTypes = $this->bedRepository->getBedTypes();

        return view('beds.show', compact('bed', 'bedAssigns', 'bedTypes'));
    }

    /**
     * Show the form for editing the specified Bed.
     *
     * @param  Bed  $bed
     *
     * @return JsonResponse
     */
    public function edit(Bed $bed)
    {
        return $this->sendResponse($bed, __('messages.flash.bed_retrieved'));
    }

    /**
     * Update the specified Bed in storage.
     *
     * @param  Bed  $bed
     * @param  UpdateBedRequest  $request
     *
     * @return JsonResponse
     */
    public function update(Bed $bed, UpdateBedRequest $request)
    {
        $input = $request->all();
        $input['charge'] = removeCommaFromNumbers($input['charge']);

        $bed = $this->bedRepository->update($input, $bed->id);

        return $this->sendSuccess( __('messages.flash.bed_updated'));
    }

    /**
     * Remove the specified Bed from storage.
     *
     * @param  Bed  $bed
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(Bed $bed)
    {
        $bedModel = [
            BedAssign::class, IpdPatientDepartment::class,
        ];
        $result = canDelete($bedModel, 'bed_id', $bed->id);
        if ($result) {
            return $this->sendError( __('messages.flash.bed_cant_deleted'));
        }
        $this->bedRepository->delete($bed->id);

        return $this->sendSuccess( __('messages.flash.bed_deleted'));
    }

    /**
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function activeDeActiveStatus($id)
    {
        $bed = Bed::findOrFail($id);
        $bed->status = ! $bed->status;
        $bed->update(['status' => $bed->status]);

        return $this->sendSuccess( __('messages.common.status_updated_successfully'));
    }

    /**
     * @return Factory|View
     */
    public function createBulkBeds()
    {
        $bedTypes = $this->bedRepository->getBedTypes();
        $associateBedTypes = $this->bedRepository->getAssociateBedsList();

        return view('beds.create_bulk_beds', compact('bedTypes', 'associateBedTypes'));
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function storeBulkBeds(CreateBulkBedRequest $request)
    {
        $input = $request->all();
        $bulkBeds = $this->bedRepository->storeBulkBeds($input);

        return $this->sendResponse($bulkBeds,  __('messages.flash.beds_saved'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function bedExport()
    {
        $response = Excel::download(new BedExport, 'beds-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }
}
