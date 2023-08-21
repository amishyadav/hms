<?php

namespace App\Http\Controllers;

use App\Exports\PostalExport;
use App\Http\Requests\PostalRequest;
use App\Models\Postal;
use App\Repositories\PostalRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class PostalController
 */
class PostalController extends AppBaseController
{
    /**
     * @var postalRepository
     */
    private $postalRepository;

    /**
     * PostalController constructor.
     *
     * @param  PostalRepository  $postalRepository
     */
    public function __construct(PostalRepository $postalRepository)
    {
        $this->postalRepository = $postalRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        if (Route::current()->getName() == 'receives.index') {
            return view('postals.receives.index');
        }
        if (Route::current()->getName() == 'dispatches.index') {
            return view('postals.dispatches.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostalRequest  $request
     *
     * @return JsonResponse
     */
    public function store(PostalRequest $request)
    {
        $input = $request->all();

        $this->postalRepository->store($input);

        if (Route::current()->getName() == 'receives.store') {
            return $this->sendSuccess(__('messages.flash.postal_receive_saved'));
        }

        if (Route::current()->getName() == 'dispatches.store') {
            return $this->sendSuccess(__('messages.flash.postal_dispatch_saved'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Postal  $postal
     *
     * @return JsonResponse
     */
    public function edit(Postal $postal)
    {
        if (Route::current()->getName() == 'receives.edit') {
            return $this->sendResponse($postal,__('messages.flash.postal_receive_retrieved'));
        }

        if (Route::current()->getName() == 'dispatches.edit') {
            return $this->sendResponse($postal,__('messages.flash.postal_dispatch_retrieved'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostalRequest  $request
     *
     * @param  Postal  $postal
     *
     * @return JsonResponse
     */
    public function update(Request $request, Postal $postal)
    {
        $this->postalRepository->updatePostal($request->all(), $postal->id);

        if (Route::current()->getName() == 'receives.update') {
            return $this->sendSuccess(__('messages.flash.postal_receive_update'));
        }

        if (Route::current()->getName() == 'dispatches.update') {
            return $this->sendSuccess(__('messages.flash.postal_dispatch_update'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Postal  $postal
     *
     * @return JsonResponse
     */
    public function destroy(Postal $postal)
    {
        $this->postalRepository->deleteDocument($postal->id);

        return $this->sendSuccess(__('messages.flash.postal_deleted'));
    }

    /**
     * @param  Postal  $postal
     *
     * @return string
     */
    public function downloadMedia(Postal $postal)
    {
        list($file, $headers) = $this->postalRepository->downloadMedia($postal);

        return response($file, 200, $headers);
    }

    /**
     * @return BinaryFileResponse
     */
    public function export()
    {
        if (Route::current()->getName() == 'receives.excel') {
            $response = Excel::download(new PostalExport, 'receive-'.time().'.xlsx');

            ob_end_clean();

            return $response;
        }

        if (Route::current()->getName() == 'dispatches.excel') {
            $response = Excel::download(new PostalExport, 'dispatch-'.time().'.xlsx');

            ob_end_clean();

            return $response;
        }
    }
}
