<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use App\Repositories\AdminRepository;
use Flash;
use Illuminate\Http\Request;

class AdminController extends AppBaseController
{
    /** @var AdminRepository $adminRepository */
    private $adminRepository;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepository = $adminRepo;
    }

    /**
     * Display a listing of the Admin.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        return view('admins.index');
    }

    /**
     * Show the form for creating a new Admin.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created Admin in storage.
     *
     * @param CreateAdminRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateAdminRequest $request)
    {
        $input = $request->all();

        $this->adminRepository->store($input);

        Flash::success(__('messages.admin_user.admin_saved_successfully'));

        return redirect(route('admins.index'));
    }

    /**
     * Display the specified Admin.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('admins.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified Admin.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = $this->adminRepository->find($id);
//        dd($user);
        return view('admins.edit')->with('user', $user);
    }

    /**
     * Update the specified Admin in storage.
     *
     * @param int $id
     * @param UpdateAdminRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateAdminRequest $request)
    {

        $checkSuperAdmin = User::whereId($id)->where('is_super_admin_default', 1)->exists();
        if ($checkSuperAdmin) {

            Flash::error(__('messages.common.this_action_is_not_allowed_for_default_record'));

            return redirect(route('admins.index'));
        }

        $user = $this->adminRepository->find($id);

        $input = $request->all();

        $this->adminRepository->update($user, $input);

        Flash::success(__('messages.admin_user.admin_updated_successfully'));

        return redirect(route('admins.index'));
    }

    /**
     * Remove the specified Admin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $checkSuperAdmin = User::whereId($id)->where('is_super_admin_default', 1)->exists();
        if ($checkSuperAdmin) {
            return $this->sendError('Default SuperAdmin can\'t be deleted.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return $this->sendSuccess(__('messages.admin_user.admin_deleted_successfully'));
    }
}

