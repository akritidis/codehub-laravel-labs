<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacationsStoreRequest;
use App\Http\Requests\VacationsUpdateRequest;
use App\Http\Resources\VacationResource;
use App\Models\Vacation;
use App\Models\User;

class UsersVacationsController extends Controller
{
    /**
     * Get a list of vacations
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user) {
        $vacations = $user->vacations;
        return response()->json(compact('vacations'));
    }

    /**
     * Get a single vacation
     *
     * @param Vacation $vacation
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Vacation $vacation) {
        $vacation = new VacationResource($vacation);
        return response()->json(compact('vacation'));
    }

    /**
     * Create a new vacation
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
     * Update a specific vacation
     *
     * @param UpdateRequest $request
     * @param Vacation    $vacation
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(VacationsUpdateRequest $request, Vacation $vacation) {
        $vacation->update($request->only('from', 'to', 'user_id'));
        return response()->json(null, 204);
    }

    /**
     * Delete a specific vacation
     *
     * @param Vacation $vacation
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Vacation $vacation) {
        $vacation->delete();
        return response()->json(null, 204);
    }
}
