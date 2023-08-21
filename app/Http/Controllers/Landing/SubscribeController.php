<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSubscribeRequest;
use App\Models\Subscribe;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscribeController extends AppBaseController
{
    /**
     * @param  Request  $request
     * @throws Exception
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('subscribe.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CreateSubscribeRequest  $request
     * @return JsonResponse
     */
    public function store(CreateSubscribeRequest $request)
    {
        $input = $request->all();
        Subscribe::create([
            'email'     => $input['email'],
            'subscribe' => Subscribe::SUBSCRIBE,
        ]);

        return $this->sendSuccess('Subscribed Successfully.');
    }

    /**
     * @param  Subscribe  $subscribe
     * @return mixed
     */
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();

        return $this->sendSuccess('Subscriber deleted successfully.');
    }
}
