<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\UsersDepartmentsStoreRequest;

class DepartmentsController extends Controller
{
    /**
     * Get a list of users
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $users = UserResource::collection(User::all());
        $count = count($users);

        return response()->json(compact('users', 'count'));
    }

    /**
     * Get a single user
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user) {
        
    }

    /**
     * Create a new user
     *
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Department $department, User $user) {
        
    }

    /**
     * Update a specific user
     *
     * @param UpdateRequest $request
     * @param User    $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Department $department, User $user) {
        $user->department()->associate($department);
        return response()->json($user, 203);
    }

    /**
     * Delete a specific user
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Department $department, User $user) {
        $user->department()->dissociate($department);
        return response()->json(null, 204);
    }
}
