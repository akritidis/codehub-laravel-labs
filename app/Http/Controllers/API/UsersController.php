<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UsersController extends Controller
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
        $user = new UserResource($user);
        return response()->json(compact('user'));
    }

    /**
     * Create a new user
     *
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UsersStoreRequest $request) {
        $user = User::create($request->only('firstname', 'lastname', 'email', 'password'));
        return response()->json(compact('user'), 201);
    }

    /**
     * Update a specific user
     *
     * @param UpdateRequest $request
     * @param User    $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UsersUpdateRequest $request, User $user) {
        $user->update($request->only('firstName', 'lastName', 'email'));
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
    public function destroy(User $user) {
        $user->delete();
        return response()->json(null, 204);
    }
}
