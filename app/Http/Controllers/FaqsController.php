<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFaqsRequest;
use App\Models\Faqs;
use App\Repositories\FaqsRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FaqsController extends AppBaseController
{
    /**
     * @var FaqsRepository
     */
    private $faqsRepo;

    /**
     * @param  FaqsRepository  $faqsRepository
     */
    public function __construct(FaqsRepository $faqsRepository)
    {
        $this->faqsRepo = $faqsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @throws Exception
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view('landing.faqs.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFaqsRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateFaqsRequest $request)
    {
        $input = $request->all();
        $this->faqsRepo->store($input);

        return $this->sendSuccess( __('messages.flash.FAQs_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function show($id)
    {
        $faqs = Faqs::findOrFail($id);

        return $this->sendResponse($faqs, __('messages.flash.FAQs_retrieved'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function edit($id)
    {
        $faqs = Faqs::findOrFail($id);

        return $this->sendResponse($faqs, __('messages.flash.FAQs_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateFaqsRequest  $request
     *
     * @param  Faqs  $faqs
     *
     * @return JsonResponse
     */
    public function update(CreateFaqsRequest $request, Faqs $faqs)
    {
        $input = $request->all();
        $this->faqsRepo->updateFaqs($input, $faqs);

        return $this->sendSuccess( __('messages.flash.FAQs_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $faqs = Faqs::findOrFail($id);
        $faqs->delete();

        return $this->sendSuccess( __('messages.flash.FAQs_deleted'));
    }
}
