<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UsersSkillsStoreRequest;

class UsersSkillsController extends Controller
{   
    /**
     * Get a list of users' skills
     *
     * @return \Illuminate\Http\JsonResponse
     */
     public function index($id) {
        $user = User::with('skills')->findOrFail($id);

        return response()->json([
            'skills' => $user->skills
        ]);
    }

    /**
     * Create a new skill
     *
     * @param SkillsStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UsersSkillsStoreRequest $request) {
        // $skill = Skill::create($request->only('idArray'));
        // return response()->json(compact('skill'), 201);
    }
}
