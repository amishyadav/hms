<?php

namespace App\Http\Controllers;

use App\Exports\ChargeExport;
use App\Http\Requests\CreateChargeRequest;
use App\Http\Requests\UpdateChargeRequest;
use App\Models\Charge;
use App\Models\ChargeCategory;
use App\Repositories\ChargeRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ChargeController extends AppBaseController
{
    /** @var ChargeRepository */
    private $chargeRepository;

    public function __construct(ChargeRepository $chargeRepo)
    {
        $this->chargeRepository = $chargeRepo;
    }

    /**
     * Display a listing of the Charge.
     *
     * @param  Request  $request
     *
     * @return Factory|View
     * @throws Exception
     *
     */
    public function index(Request $request)
    {
        $chargeTypes = ChargeCategory::CHARGE_TYPES;
        asort($chargeTypes);
        $filterChargeTypes = ChargeCategory::FILTER_CHARGE_TYPES;
        asort($filterChargeTypes);

        return view('charges.index', compact('chargeTypes', 'filterChargeTypes'));
    }

    /**
     * Store a newly created Charge in storage.
     *
     * @param  CreateChargeRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateChargeRequest $request)
    {
        $input = $request->all();
        $input['standard_charge'] = removeCommaFromNumbers($input['standard_charge']);
        $charge = $this->chargeRepository->create($input);

        return $this->sendSuccess( __('messages.flash.charge_saved'));
    }

    /**
     * Display the specified Charge.
     *
     * @param  Charge  $charge
     *
     * @return Factory|View
     */
    public function show(Charge $charge)
    {
        $chargeTypes = ChargeCategory::CHARGE_TYPES;
        asort($chargeTypes);

        return view('charges.show', compact('charge', 'chargeTypes'));
    }

    /**
     * Show the form for editing the specified Charge.
     *
     * @param  Charge  $charge
     *
     * @return JsonResponse
     */
    public function edit(Charge $charge)
    {
        return $this->sendResponse($charge, __('messages.flash.charge_retrieved'));
    }

    /**
     * Update the specified Charge in storage.
     *
     * @param  Charge  $charge
     * @param  UpdateChargeRequest  $request
     *
     * @return JsonResponse
     */
    public function update(Charge $charge, UpdateChargeRequest $request)
    {
        $input = $request->all();
        $input['standard_charge'] = removeCommaFromNumbers($input['standard_charge']);
        $charge = $this->chargeRepository->update($input, $charge->id);

        return $this->sendSuccess( __('messages.flash.charge_retrieved'));
    }

    /**
     * Remove the specified Charge from storage.
     *
     * @param  Charge  $charge
     *
     * @return JsonResponse
     * @throws Exception
     *
     */
    public function destroy(Charge $charge)
    {
        $this->chargeRepository->delete($charge->id);

        return $this->sendSuccess( __('messages.flash.charge_deleted'));
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function getChargeCategory(Request $request)
    {
        $id = $request->get('id');

        $chargeCategory = ChargeCategory::where('charge_type', '=', $id)
            ->get()->pluck('name', 'id');

        return $this->sendResponse($chargeCategory, __('messages.flash.charge_category_retrieved'));
    }

    /**
     * @return BinaryFileResponse
     */
    public function chargeExport()
    {
        $response = Excel::download(new ChargeExport, 'charges-'.time().'.xlsx');

        ob_end_clean();

        return $response;
    }
}
