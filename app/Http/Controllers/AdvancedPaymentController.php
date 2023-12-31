<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdvancedPaymentRequest;
use App\Http\Requests\UpdateAdvancedPaymentRequest;
use App\Models\AdvancedPayment;
use App\Repositories\AdvancedPaymentRepository;
use Exception;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class AdvancedPaymentController extends AppBaseController
{
    /** @var AdvancedPaymentRepository */
    private $advancedPaymentRepository;

    public function __construct(AdvancedPaymentRepository $advancedPaymentRepo)
    {
        $this->advancedPaymentRepository = $advancedPaymentRepo;
    }

    /**
     * Display a listing of the AdvancedPayment.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
//        $receiptNo = strtoupper(Str::random(8));
        $patients = $this->advancedPaymentRepository->getPatients();

        return view('advanced_payments.index', compact('patients'));
    }

    /**
     * Store a newly created AdvancedPayment in storage.
     *
     * @param  CreateAdvancedPaymentRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateAdvancedPaymentRequest $request)
    {
        $input = $request->all();
        $input['amount'] = removeCommaFromNumbers($input['amount']);
        Schema::disableForeignKeyConstraints();
        $this->advancedPaymentRepository->create($input);
        Schema::enableForeignKeyConstraints();
        $this->advancedPaymentRepository->createNotification($input);

        return $this->sendSuccess( __('messages.flash.advanced_payment_save'));
    }

    /**
     * @param  AdvancedPayment  $advancedPayment
     *
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function show(AdvancedPayment $advancedPayment)
    {
        $advancedPayment = $this->advancedPaymentRepository->find($advancedPayment->id);
        if (empty($advancedPayment)) {
            Flash::error( __('messages.flash.advanced_payment_not'));

            return redirect(route('advancedPayments.index'));
        }
        $patients = $this->advancedPaymentRepository->getPatients();

        return view('advanced_payments.show')->with(['advancedPayment' => $advancedPayment, 'patients' => $patients]);
    }

    /**
     * Show the form for editing the specified AdvancedPayment.
     *
     * @param  AdvancedPayment  $advancedPayment
     *
     * @return JsonResponse
     */
    public function edit(AdvancedPayment $advancedPayment)
    {
        return $this->sendResponse($advancedPayment, __('messages.flash.advanced_payment_retrieve'));
    }

    /**
     * @param  AdvancedPayment  $advancedPayment
     * @param  UpdateAdvancedPaymentRequest  $request
     *
     * @return JsonResponse
     */
    public function update(AdvancedPayment $advancedPayment, UpdateAdvancedPaymentRequest $request)
    {
        $input = $request->all();
        $input['amount'] = removeCommaFromNumbers($input['amount']);
        Schema::disableForeignKeyConstraints();
        $this->advancedPaymentRepository->update($input, $advancedPayment->id);
        Schema::enableForeignKeyConstraints();

        return $this->sendSuccess( __('messages.flash.advanced_payment_updated'));
    }

    /**
     * Remove the specified AdvancedPayment from storage.
     *
     * @param  AdvancedPayment  $advancedPayment
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(AdvancedPayment $advancedPayment)
    {
        $advancedPayment->delete();

        return $this->sendSuccess( __('messages.flash.advanced_payment_deleted'));
    }
}
