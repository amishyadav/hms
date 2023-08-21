<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\HospitalRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class HospitalController extends AppBaseController
{

    /** @var HospitalRepository */
    private $hospitalRepository;

    public function __construct(HospitalRepository $hospitalRepo)
    {
        $this->hospitalRepository = $hospitalRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('super_admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CreateHospitalRequest  $request
     *
     * @throws \Throwable
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateHospitalRequest $request)
    {
        $input = $request->all();
        $this->hospitalRepository->store($input);

        Flash::success( __('messages.flash.hospital_saved'));

        return redirect(route('super.admin.hospitals.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $users = $this->hospitalRepository->getUserData($id);

        return view('super_admin.users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $hospital = User::findOrFail($id);

        return view('super_admin.users.edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateHospitalRequest  $request
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateHospitalRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        $this->hospitalRepository->updateHospital($input, $user);

        Flash::success( __('messages.flash.hospital_update'));

        return redirect(route('super.admin.hospitals.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->hospitalRepository->deleteHospital($id);

        return $this->sendSuccess( __('messages.flash.user_deleted'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Exception
     * @return void
     */
    public function billingIndex(Request $request)
    {

    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Exception
     * @return void
     */
    public function transactionIndex(Request $request)
    {

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function billingModal($id)
    {
        $subscription = Subscription::with('subscriptionPlan', 'transactions')->where('transaction_id', $id)->get();

        return $this->sendResponse($subscription, __('messages.flash.subscription_retrieved'));
    }
}
