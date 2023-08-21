<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRadiologyCategoryRequest;
use App\Http\Requests\UpdateRadiologyCategoryRequest;
use App\Models\RadiologyCategory;
use App\Models\RadiologyTest;
use App\Repositories\RadiologyCategoryRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RadiologyCategoryController extends AppBaseController
{
    /** @var RadiologyCategoryRepository */
    private $radiologyCategoryRepository;

    public function __construct(RadiologyCategoryRepository $radiologyCategoryRepo)
    {
        $this->middleware('check_menu_access');
        $this->radiologyCategoryRepository = $radiologyCategoryRepo;
    }

    /**
     * Display a listing of the RadiologyCategory.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('radiology_categories.index');
    }

    /**
     * Store a newly created RadiologyCategory in storage.
     *
     * @param  CreateRadiologyCategoryRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateRadiologyCategoryRequest $request)
    {
        $input = $request->all();
        $this->radiologyCategoryRepository->create($input);

        return $this->sendSuccess(__('messages.flash.radiology_category_saved'));
    }

    /**
     * Show the form for editing the specified RadiologyCategory.
     *
     * @param  RadiologyCategory  $radiologyCategory
     *
     * @return JsonResponse
     */
    public function edit(RadiologyCategory $radiologyCategory)
    {
        return $this->sendResponse($radiologyCategory, __('messages.flash.radiology_category_retrieved'));
    }

    /**
     * Update the specified RadiologyCategory in storage.
     *
     * @param  RadiologyCategory  $radiologyCategory
     * @param  UpdateRadiologyCategoryRequest  $request
     *
     * @return JsonResponse
     */
    public function update(RadiologyCategory $radiologyCategory, UpdateRadiologyCategoryRequest $request)
    {
        $input = $request->all();
        $this->radiologyCategoryRepository->update($input, $radiologyCategory->id);

        return $this->sendSuccess(__('messages.flash.radiology_category_updated'));
    }

    /**
     * Remove the specified RadiologyCategory from storage.
     *
     * @param  RadiologyCategory  $radiologyCategory
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(RadiologyCategory $radiologyCategory)
    {
        $radiologyCategoryModels = [
            RadiologyTest::class,
        ];
        $result = canDelete($radiologyCategoryModels, 'category_id', $radiologyCategory->id);
        if ($result) {
            return $this->sendError(__('messages.flash.radiology_category_cant_deleted'));
        }

        $radiologyCategory->delete();

        return $this->sendSuccess(__('messages.flash.radiology_category_deleted'));
    }
}
