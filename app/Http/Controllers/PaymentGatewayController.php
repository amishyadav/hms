<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use App\Repositories\PaymentGatewayRepository;

class PaymentGatewayController extends Controller
{

    /**
     * @var PaymentGatewayRepository
     */
    private $PaymentGatewayRepository;

    /**
     * SettingController constructor.
     * @param  PaymentGatewayRepository  $PaymentGatewayRepository
     */
    public function __construct(PaymentGatewayRepository $PaymentGatewayRepository)
    {
        $this->PaymentGatewayRepository = $PaymentGatewayRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tenantId = User::findOrFail(getLoggedInUserId())->tenant_id;
        $setting = Setting::where('tenant_id',$tenantId)->pluck('value', 'key')->toArray();
            
        return view('settings.Credentials',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->PaymentGatewayRepository->PaymentGateway($request->all());
        Flash::success(__('messages.flash.payment_gateway_updated'));

        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
