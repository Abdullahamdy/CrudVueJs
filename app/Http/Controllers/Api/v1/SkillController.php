<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\v1\SkillCollection;
use App\Http\Resources\v1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        return new SkillCollection(Skill::all());
    }

    public function show(Skill $skill){
        return new SkillResource($skill);
    }
    public function store(SkillRequest $request)
    {
        Skill::create($request->validated());
        return response()->json("skills Created");

    }
    public function update(SkillRequest $request,Skill $skill)
    {
        $skill->update($request->validated());
        return response()->json("skills Updated");

    }
    public function destroy(Skill $skill){
        $skill->delete();
        return response()->json("deleted Skill Successfully");
    }
}
