<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacationsStoreRequest;
use App\Http\Requests\VacationsUpdateRequest;
use App\Http\Resources\VacationResource;
use App\Models\Vacation;

class UsersVacationsController extends Controller
{
    /**
     * Get a list of users
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $vacations = VacationResource::collection(Vacation::all());
        $count = count($vacations);
        return response()->json(compact('users', 'count'));
    }

    /**
     * Get a single user
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Vacation $vacation) {
        $vacation = new VacationResource($vacation);
        return response()->json(compact('user'));
    }

    /**
     * Create a new user
     *
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(VacationsStoreRequest $request) {
        $vacation = Vacation::create($request->only('from', 'to', 'user_id'));
        return response()->json(compact('vacation'), 201);
    }

    /**
     * Update a specific user
     *
     * @param UpdateRequest $request
     * @param User    $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(VacationsUpdateRequest $request, Vacation $vacation) {
        $vacation->update($request->only('from', 'to', 'user_id'));
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
    public function destroy(Vacation $vacation) {
        $vacation->delete();
        return response()->json(null, 204);
    }
}
