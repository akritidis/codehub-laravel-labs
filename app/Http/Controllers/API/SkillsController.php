<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\SkillsStoreRequest;
use App\Http\Requests\SkillsUpdateRequest;

class SkillsController extends Controller
{   
    /**
     * Get a list of skills
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $skills = Skill::all();

        return compact('skills');
    }

    /**
     * Create a new skill
     *
     * @param SkillsStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SkillsStoreRequest $request) {
        $skill = Skill::create($request->only('title'));
        return response()->json(compact('skill'), 201);
    }

     /**
     * Update a specific skill
     *
     * @param SkillsUpdateRequest $request
     * @param Skill    $skill
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SkillsUpdateRequest $request, Skill $skill) {
        $skill->update($request->only('title'));
        return response()->json(null, 204);
    }
    
     /**
     * Delete a specific skill
     *
     * @param Skill $skill
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Skill $skill) {
        $skill->delete();
        return response()->json(null, 204);
    }
}
