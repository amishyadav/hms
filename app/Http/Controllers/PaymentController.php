<?php

namespace App\Http\Controllers;

use App\Exports\PaymentExport;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
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

class PaymentController extends AppBaseController
{
    /** @var PaymentRepository */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Payment.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('payments.index');
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Factory|View
     */
    public function create()
    {
        $accounts = $this->paymentRepository->getAccounts();

        return view('payments.create', compact('accounts'));
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param  CreatePaymentRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();
        $input['amount'] = removeCommaFromNumbers($input['amount']);
        $payment = $this->paymentRepository->create($input);

        Flash::success(__('messages.flash.payment_saved'));

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payment.
     *
     * @param  int  $id
     *
     * @return Factory|View
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified Payment.
     *
     * @param  int  $id
     *
     * @return Factory|View
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $accounts = $this->paymentRepository->getAccounts();

        return view('payments.edit', compact('accounts', 'payment'));
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  Payment  $payment
     * @param  UpdatePaymentRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Payment $payment, UpdatePaymentRequest $request)
    {
        $input = $request->all();
        $input['amount'] = removeCommaFromNumbers($input['amount']);
        $payment = $this->paymentRepository->update($input, $payment->id);

        Flash::success(__('messages.flash.payment_updated'));

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified Payment from storage.
     *
     * @param  Payment  $payment
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(Payment $payment)
    {
        $this->paymentRepository->delete($payment->id);

        return $this->sendSuccess(__('messages.flash.payment_deleted'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function paymentExport()
    {
        $response = Excel::download(new PaymentExport, 'payments-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }

    /**
     * @param  Payment  $payment
     * 
     * @return JsonResponse
     */
    public function showModal(Payment $payment)
    {
        $payment->load('account');
        $payment['amount'] = getCurrencySymbol().' '.number_format($payment->amount,2);
        
        return $this->sendResponse($payment, __('messages.flash.payment_retrieved'));
    }
}
