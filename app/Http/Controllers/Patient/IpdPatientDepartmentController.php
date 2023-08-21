<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\IpdPatientDepartment;
use App\Models\IpdPayment;
use App\Models\Setting;
use App\Models\User;
use App\Repositories\IpdBillRepository;
use App\Repositories\IpdPatientDepartmentRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IpdPatientDepartmentController extends Controller
{
    /** @var IpdPatientDepartmentRepository */
    private $ipdPatientDepartmentRepository;

    public function __construct(IpdPatientDepartmentRepository $ipdPatientDepartmentRepo)
    {
        $this->ipdPatientDepartmentRepository = $ipdPatientDepartmentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('ipd_patient_list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  IpdPatientDepartment  $ipdPatientDepartment
     *
     * @return Factory|View
     */
    public function show(IpdPatientDepartment $ipdPatientDepartment)
    {
        $tenantId = User::findOrFail(getLoggedInUserId())->tenant_id;
        $stripeKey = Setting::whereTenantId($tenantId)->where('key', '=', 'stripe_key')->first()->value;
        $paymentModes = IpdPayment::PAYMENT_MODES;
        $ipdPatientDepartmentRepository = \App::make(IpdBillRepository::class);
        $bill = $ipdPatientDepartmentRepository->getBillList($ipdPatientDepartment);

        return view('ipd_patient_list.show', compact('ipdPatientDepartment', 'paymentModes', 'bill', 'stripeKey'));
    }
}
