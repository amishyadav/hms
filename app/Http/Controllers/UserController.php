<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Department;
use App\Models\DoctorDepartment;
use App\Models\User;
use App\Repositories\UserRepository;
use Auth;
use Carbon\Carbon;
use DB;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Throwable;
use URL;


/**
 * Class UserController
 */
class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * @param  ChangePasswordRequest  $request
     *
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->changePassword($input);

            return $this->sendSuccess( __('messages.flash.password_update'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 422);
        }
    }

    /**
     * @param  UpdateUserProfileRequest  $request
     *
     * @return JsonResponse
     */
    public function profileUpdate(UpdateUserProfileRequest $request)
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->profileUpdate($input);

            return $this->sendResponse($user,  __('messages.flash.profile_update'));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified User.
     *
     * @return JsonResponse
     */
    public function editProfile()
    {
        $user = getLoggedInUser()->append('image_url');

        return $this->sendResponse($user, __('messages.flash.user_retrieved'));
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function updateLanguage(Request $request)
    {
        $language = $request->get('language');

        /** @var User $user */
        $user = $request->user();
        $user->update(['language' => $language]);

        return $this->sendSuccess( __('messages.flash.language_update'));
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $userRole = ['Admin', 'Super Admin'];
        $roles = Department::whereNotIn('name', $userRole)->orderBy('name')->pluck('name', 'id')->toArray();
        $status = User::STATUS_ARR;

        if (getLoggedInUser()->hasRole('Super Admin')) {
            return view('super_admin.users.index', compact('roles', 'status'));
        }

        return view('users.index', compact('roles', 'status'));
    }

    public function create()
    {
        $isEdit = false;
        $userRole = ['Super Admin'];
        $role = Department::whereNotIn('name', $userRole)->orderBy('name')->groupBy('name')->pluck('name', 'id')->toArray();
        $doctorDepartments = DoctorDepartment::pluck('title', 'id')->toArray();

        return view('users.create', compact('isEdit', 'role', 'doctorDepartments'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  CreateUSerRequest  $request
     *
     * @return RedirectResponse|Redirector
     * @throws Throwable
     */
    public function store(CreateUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $input['status'] = isset($input['status']) ? 1 : 0;
            $this->userRepository->store($input);
            Flash::success( __('messages.flash.user_saved'));
            DB::commit();

            return redirect(route('users.index'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $user
     * @return Application|Factory|View
     */
    public function show($user)
    {
        $userData = $this->userRepository->getUserData($user);

        return view('users.show', compact('userData'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  User  $user
     *
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $role = Department::pluck('name', 'id')->all();
        $isEdit = true;

        return view('users.edit', compact('isEdit', 'user', 'role'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  UpdateUserRequest  $request
     *
     * @param  User  $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['dob'] = (! empty($input['dob'])) ? $input['dob'] : null;
        $input['phone'] = preparePhoneNumber($input, 'phone');
        $this->userRepository->updateUser($input, $user->id);
        Flash::success( __('messages.flash.user_updated'));

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        $checkAdmin = User::whereId($user->id)->where('is_admin_default', 1)->exists();
        if ($checkAdmin) {
            return $this->sendError('Default Admin can\'t be deleted.');
        }

        $this->userRepository->deleteUser($user->id);

        return $this->sendSuccess(__('messages.flash.user_deleted'));
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function activeDeactiveStatus($id)
    {
        $hospital = User::findOrFail($id);
        $status = !$hospital->status;
        User::where('tenant_id', $hospital->tenant_id)->update(['status' => $status]);

        return $this->sendSuccess( __('messages.common.status_updated_successfully'));
    }

    /**
     * @param $id
     *
     *
     * @return JsonResponse
     */
    public function activeDeactiveUserStatus($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == User::INACTIVE) {
            $user->update(['status' => User::ACTIVE]);
        } else {
            $user->update(['status' => User::INACTIVE]);
        }

        return $this->sendSuccess(__('messages.common.status_updated_successfully'));
    }

    /**
     * @param $user
     * @return Application|Factory|View
     */
    public function showModal($user)
    {
        $users = $this->userRepository->getUserData($user);

        return $this->sendResponse($users, __('messages.flash.user_retrieved'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Exception
     * @return void
     */
    public function hospitalIndex(Request $request)
    {

    }

    /**
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function isVerified($id)
    {
        $user = User::findOrFail($id);
        $emailVerified = $user->email_verified_at == null ? Carbon::now() : null;
        $user->update(['email_verified_at' => $emailVerified]);

        return $this->sendSuccess( __('messages.flash.email_verified'));
    }

    /**
     * @param User $user
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function userImpersonateLogin(User $user)
    {
        Auth::user()->impersonate($user);
        $url = redirectToDashboard();

        return redirect(url($url));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function userImpersonateLogout()
    {
        Auth::user()->leaveImpersonation();

        return redirect(url('super-admin/dashboard'));
    }

    public function changeThemeMode()
    {
        $user = User::find(getLoggedInUser()->id);

        if($user->theme_mode == User::LIGHT_MODE)
        {
            $user['theme_mode'] = User::DARK_MODE;
        }
        else{
            $user['theme_mode'] = User::LIGHT_MODE;
        }

        $user->update();

        return redirect(URL::previous());
    }
    /**
     * @param User $user
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function impersonate(User $user){
        getLoggedInUser()->impersonate($user);
        return redirect(route('dashboard'));
    }
}
