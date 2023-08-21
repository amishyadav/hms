<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecurrencySettingRequest;
use App\Http\Requests\UpdatecurrencySettingRequest;
use App\Models\CurrencySetting;
use App\Models\Setting;
use App\Repositories\currencySettingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CurrencySettingController extends AppBaseController
{
    /** @var currencySettingRepository $currencySettingRepository*/
    private $currencySettingRepository;

    public function __construct(currencySettingRepository $currencySettingRepo)
    {
        $this->currencySettingRepository = $currencySettingRepo;
    }

    /**
     * Display a listing of the currencySetting.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $currencySettings = $this->currencySettingRepository->all();

        return view('currency_settings.index')
            ->with('currencySettings', $currencySettings);
    }

    /**
     * Show the form for creating a new currencySetting.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('currency_settings.create');
    }

    /**
     * Store a newly created currencySetting in storage.
     *
     * @param CreatecurrencySettingRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreatecurrencySettingRequest $request)
    {
        $input = $request->all();
        
        $this->currencySettingRepository->create($input);

        return $this->sendSuccess('Currency saved successfully');
    }

    /**
     * Display the specified currencySetting.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $currencySetting = $this->currencySettingRepository->find($id);

        if (empty($currencySetting)) {
            Flash::error('Currency Setting not found');

            return redirect(route('currencySettings.index'));
        }

        return view('currency_settings.show')->with('currencySetting', $currencySetting);
    }

    /**
     * Show the form for editing the specified currencySetting.
     *
     * @param \App\Models\CurrencySetting $currencySetting
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(CurrencySetting $currencySetting)
    {
        return $this->sendResponse($currencySetting, 'Currency retrieved successfully.');
    }

    /**
     * Update the specified currencySetting in storage.
     *
     * @param \App\Models\CurrencySetting $currencySetting
     * @param UpdatecurrencySettingRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CurrencySetting $currencySetting, UpdatecurrencySettingRequest $request)
    {
        $input = $request->all();

        $this->currencySettingRepository->update($input, $currencySetting->id);

        return $this->sendSuccess('Currency updated successfully');
    }

    /**
     * Remove the specified currencySetting from storage.
     *
     * @param \App\Models\CurrencySetting $currencySetting
     * @throws \Exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(CurrencySetting $currencySetting)
    {
        $currency = Setting::where('key','current_currency')->first()->value;
        if($currency == strtolower($currencySetting->currency_code))
        {
            return $this->sendError('Can not be delete default currency');
        }
        else
        {
            $this->currencySettingRepository->delete($currencySetting->id);

            return $this->sendSuccess('Currency deleted');
        }
    }
}
