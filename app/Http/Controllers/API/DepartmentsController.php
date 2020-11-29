<?php

namespace App\Http\Controllers\API;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;

class DepartmentsController extends Controller
{
    /**
     * Get a list of users
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $users = DepartmentResource::collection(Department::all());
        return response()->json(compact('departments'));
    }

    /**
     * Get a single user
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Department $department) {
        $department = new DepartmentResource($department);

        return response()->json(compact('department'));
    }

    /**
     * Create a new user
     *
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request) {
        $department = Department::create($request->only('title', 'manager_id'));

        return response()->json(['department' => new DepartmentResource($department)], 201);
    }

    /**
     * Update a specific user
     *
     * @param UpdateRequest $request
     * @param User    $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Department $department, UpdateRequest $request) {
        $department->update($request->only('title', 'manager_id'));
        return response()->json(null, 204);
    }

    /**
     * Delete a specific user
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Department $department) {
        $department->delete();
        return response()->json(null, 204);
    }
}
