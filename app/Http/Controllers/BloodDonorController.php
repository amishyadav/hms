<?php

namespace App\Http\Controllers;

use App\Exports\BloodDonorExport;
use App\Http\Requests\CreateBloodDonorRequest;
use App\Http\Requests\UpdateBloodDonorRequest;
use App\Models\BloodDonation;
use App\Models\BloodDonor;
use App\Repositories\BloodDonorRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BloodDonorController extends AppBaseController
{
    /** @var BloodDonorRepository */
    private $bloodDonorRepository;

    public function __construct(BloodDonorRepository $bloodDonorRepo)
    {
        $this->middleware('check_menu_access');
        $this->bloodDonorRepository = $bloodDonorRepo;
    }

    /**
     * Display a listing of the BloodDonor.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $bloodGroup = getBloodGroups();

        return view('blood_donors.index', compact('bloodGroup'));
    }

    /**
     * Store a newly created BloodDonor in storage.
     *
     * @param  CreateBloodDonorRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateBloodDonorRequest $request)
    {
        $input = $request->all();
        $this->bloodDonorRepository->create($input);

        return $this->sendSuccess( __('messages.flash.blood_donor_saved'));
    }

    /**
     * Show the form for editing the specified BloodDonor.
     *
     * @param  BloodDonor  $bloodDonor
     *
     * @return JsonResponse
     */
    public function edit(BloodDonor $bloodDonor)
    {
        return $this->sendResponse($bloodDonor, __('messages.flash.blood_donor_retrieved'));
    }

    /**
     * Update the specified BloodDonor in storage.
     *
     * @param  BloodDonor  $bloodDonor
     * @param  UpdateBloodDonorRequest  $request
     *
     * @return JsonResponse
     */
    public function update(BloodDonor $bloodDonor, UpdateBloodDonorRequest $request)
    {
        $input = $request->all();
        $this->bloodDonorRepository->update($input, $bloodDonor->id);

        return $this->sendSuccess( __('messages.flash.blood_donor_updated'));
    }

    /**
     * Remove the specified BloodDonor from storage.
     *
     * @param  BloodDonor  $bloodDonor
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(BloodDonor $bloodDonor)
    {
        $bloodDonorModel = [BloodDonation::class];
        $result = canDelete($bloodDonorModel, 'blood_donor_id', $bloodDonor->id);
        if ($result) {
            return $this->sendError( __('messages.flash.blood_donor_cant_delete'));
        }
        $bloodDonor->delete($bloodDonor->id);

        return $this->sendSuccess( __('messages.flash.blood_donor_delete'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function bloodDonorExport()
    {
        $response = Excel::download(new BloodDonorExport, 'blood-donor-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }
}
