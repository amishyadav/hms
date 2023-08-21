<?php

namespace App\Http\Controllers;

use App\Exports\PaymentReportExport;
use App\Models\Account;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PaymentReportController extends Controller
{
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
        $accountTypes = Account::ACCOUNT_TYPES;

        return view('payment_reports.index', compact('accountTypes'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function paymentReportExport()
    {
        $response = Excel::download(new PaymentReportExport, 'payments-reports-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }
}
