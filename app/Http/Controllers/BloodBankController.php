<?php

namespace App\Http\Controllers;

use App\Exports\BloodBankExport;
use App\Http\Requests\CreateBloodBankRequest;
use App\Http\Requests\UpdateBloodBankRequest;
use App\Models\BloodBank;
use App\Models\BloodDonor;
use App\Models\User;
use App\Repositories\BloodBankRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BloodBankController extends AppBaseController
{
    /** @var BloodBankRepository */
    private $bloodBankRepository;

    public function __construct(BloodBankRepository $bloodBankRepo)
    {
        $this->middleware('check_menu_access');
        $this->bloodBankRepository = $bloodBankRepo;
    }

    /**
     * Display a listing of the BloodBank.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('blood_banks.index');
    }

    /**
     * Store a newly created BloodBank in storage.
     *
     * @param  CreateBloodBankRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateBloodBankRequest $request)
    {
        $input = $request->all();
        $this->bloodBankRepository->create($input);

        return $this->sendSuccess( __('messages.flash.blood_group_saved'));
    }

    /**
     * Show the form for editing the specified BloodBank.
     *
     * @param  BloodBank  $bloodBank
     *
     * @return JsonResponse
     */
    public function edit(BloodBank $bloodBank)
    {
        return $this->sendResponse($bloodBank, __('messages.flash.blood_bank_retrieved'));
    }

    /**
     * Update the specified BloodBank in storage.
     *
     * @param  BloodBank  $bloodBank
     * @param  UpdateBloodBankRequest  $request
     *
     * @return JsonResponse
     */
    public function update(BloodBank $bloodBank, UpdateBloodBankRequest $request)
    {
        $input = $request->all();
        $this->bloodBankRepository->update($input, $bloodBank->id);

        return $this->sendSuccess( __('messages.flash.blood_group_updated'));
    }

    /**
     * Remove the specified BloodBank from storage.
     *
     * @param  BloodBank  $bloodBank
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(BloodBank $bloodBank)
    {
        $bloodBankModel = [
            BloodDonor::class, User::class,
        ];
        $result = canDelete($bloodBankModel, 'blood_group', $bloodBank->blood_group);
        if ($result) {
            return $this->sendError( __('messages.flash.blood_bank_cant_deleted'));
        }
        $bloodBank->delete($bloodBank->id);

        return $this->sendSuccess( __('messages.flash.blood_bank_deleted'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function bloodBankExport()
    {
        $response = Excel::download(new BloodBankExport, 'blood-banks-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }
}
