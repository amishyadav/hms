<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use App\Repositories\TestimonialRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class TestimonialController
 */
class TestimonialController extends AppBaseController
{
    /**
     * @var testimonialRepository
     */
    private $testimonialRepository;

    /**
     * TestimonialController constructor.
     *
     * @param  TestimonialRepository  $testimonialRepository
     */
    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        return view('testimonials.index');
    }

    /**
     * Store a newly created Testimonial in storage.
     *
     * @param  TestimonialRequest  $request
     *
     * @return JsonResponse
     */
    public function store(TestimonialRequest $request)
    {
        try {
            $input = $request->all();
            $this->testimonialRepository->store($input);

            return $this->sendSuccess( __('messages.flash.testimonial_save'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified Testimonial.
     *
     * @param  Testimonial  $testimonial
     *
     * @return JsonResponse
     */
    public function edit(Testimonial $testimonial)
    {
        return $this->sendResponse($testimonial,  __('messages.flash.testimonial_retrieve'));
    }

    /**
     * @param  Testimonial  $testimonial
     *
     * @param  TestimonialRequest  $request
     *
     * @return JsonResponse
     */
    public function update(Testimonial $testimonial, TestimonialRequest $request)
    {
        try {
            $this->testimonialRepository->updateTestimonial($request->all(), $testimonial->id);

            return $this->sendSuccess( __('messages.flash.testimonial_update'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified Testimonial from storage.
     *
     * @param  Testimonial  $testimonial
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            $this->testimonialRepository->deleteTestimonial($testimonial);

            return $this->sendSuccess( __('messages.flash.testimonial_delete'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
