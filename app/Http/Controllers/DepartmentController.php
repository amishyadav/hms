<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\User;
use App\Repositories\DepartmentRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends AppBaseController
{
    /** @var DepartmentRepository */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     *
     * @param  Request  $request
     *
     * @throws Exception
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $activeArr = Department::ACTIVE_ARR;

        return view('departments.index')->with(['activeArr' => $activeArr]);
    }

    /**
     * Store a newly created Department in storage.
     *
     * @param  CreateDepartmentRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $this->departmentRepository->create($input);

        return $this->sendSuccess( __('messages.flash.department_saved'));
    }

    /**
     * Show the form for editing the specified Department.
     *
     * @param  Department  $department
     * @return JsonResponse
     */
    public function edit(Department $department)
    {
        return $this->sendResponse($department, __('messages.flash.department_retrieved'));
    }

    /**
     * Update the specified Department in storage.
     *
     * @param  Department  $department
     * @param  UpdateDepartmentRequest  $request
     *
     * @return JsonResponse
     */
    public function update(Department $department, UpdateDepartmentRequest $request)
    {
        $this->departmentRepository->update($request->all(), $department->id);

        return $this->sendSuccess( __('messages.flash.department_updated'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @param  Department  $department
     * @throws Exception
     * @return JsonResponse
     */
    public function destroy(Department $department)
    {
        $this->departmentRepository->delete($department->id);

        return $this->sendSuccess( __('messages.flash.department_deleted'));
    }

    /**
     * @param  Department  $department
     *
     * @return JsonResponse
     */
    public function activeDeactiveDepartment(Department $department)
    {
        $department->is_active = ! $department->is_active;
        $department->save();

        return $this->sendSuccess( __('messages.flash.department_updated'));
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function getUsersList(Request $request)
    {
        if (empty($request->get('id'))) {
            return $this->sendError( __('messages.flash.users_not_found'));
        }

        $usersData = User::get()->where('department_id', $request->get('id'))->where('status', 1)->pluck('full_name',
            'id');

        return $this->sendResponse($usersData, __('messages.flash.retrieve'));
    }
}
