<?php

namespace App\Http\Controllers;

use App\Exports\AmbulanceExport;
use App\Http\Requests\CreateAmbulanceRequest;
use App\Http\Requests\UpdateAmbulanceRequest;
use App\Models\Ambulance;
use App\Models\AmbulanceCall;
use App\Repositories\AmbulanceRepository;
use Exception;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AmbulanceController extends AppBaseController
{
    /** @var AmbulanceRepository */
    private $ambulanceRepository;

    public function __construct(AmbulanceRepository $ambulanceRepo)
    {
        $this->ambulanceRepository = $ambulanceRepo;
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
        $data['statusArr'] = Ambulance::STATUS_ARR;

        return view('ambulances.index', $data);
    }

    /**
     * Show the form for creating a new Ambulance.
     *
     * @return Response
     */
    public function create()
    {
        $type = Ambulance::$vehicleType;

        return view('ambulances.create', compact('type'));
    }

    /**
     * Store a newly created Ambulance in storage.
     *
     * @param  CreateAmbulanceRequest  $request
     *
     * @return Response
     */
    public function store(CreateAmbulanceRequest $request)
    {
        $input = $request->all();
        $input['is_available'] = isset($input['is_available']) ? 1 : 0;
        $input['driver_contact'] = preparePhoneNumber($input, 'driver_contact');

        $this->ambulanceRepository->create($input);
        $this->ambulanceRepository->createNotification();

        Flash::success( __('messages.flash.ambulance_saved'));

        return redirect(route('ambulances.index'));
    }

    /**
     * Display the specified Ambulance.
     *
     * @param  int  $id
     *
     * @return Factory|View
     */
    public function show($id)
    {
        $ambulance = Ambulance::findOrFail($id);
        $type = Ambulance::$vehicleType;

        return view('ambulances.show', compact('ambulance', 'type'));
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
        $ambulance = Ambulance::findOrFail($id);
        $type = Ambulance::$vehicleType;

        return view('ambulances.edit', compact('ambulance', 'type'));
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  Ambulance  $ambulance
     * @param  UpdateAmbulanceRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Ambulance $ambulance, UpdateAmbulanceRequest $request)
    {
        $input = $request->all();
        $input['is_available'] = isset($input['is_available']) ? 1 : 0;
        $input['driver_contact'] = preparePhoneNumber($input, 'driver_contact');

        $ambulance = $this->ambulanceRepository->update($input, $ambulance->id);

        Flash::success( __('messages.flash.ambulance_update'));

        return redirect(route('ambulances.index'));
    }

    /**
     * Remove the specified Ambulance from storage.
     *
     * @param  Ambulance  $ambulance
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(Ambulance $ambulance)
    {
        //        $this->ambulanceRepository->delete($ambulance->id);
        $ambulanceCallModel = [AmbulanceCall::class];
        $result = canDelete($ambulanceCallModel, 'ambulance_id', $ambulance->id);
        if ($result) {
            return $this->sendError( __('messages.flash.ambulance_cant_delete'));
        }

        $ambulance->delete($ambulance->id);

        return $this->sendSuccess( __('messages.flash.ambulance_delete'));
    }

    /**
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function isAvailableAmbulance($id)
    {
        $ambulance = Ambulance::findOrFail($id);
        $ambulance->is_available = ! $ambulance->is_available;
        $ambulance->update(['is_available' => $ambulance->is_available]);

        return $this->sendSuccess( __('messages.flash.ambulance_update'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function ambulanceExport()
    {
        $response = Excel::download(new AmbulanceExport, 'ambulances-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }
}
