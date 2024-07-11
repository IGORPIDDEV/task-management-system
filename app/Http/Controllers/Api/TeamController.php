<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Team\StoreTeamRequest;
use App\Http\Requests\Api\Team\AddUserToTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Auth::user()->teams;
        return TeamResource::collection($teams);
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->validated());
        $team->users()->attach(Auth::id());

        return new TeamResource($team);
    }

    public function addUser(AddUserToTeamRequest $request, $teamId)
    {
        $team = Team::findOrFail($teamId);
        $user = User::findOrFail($request->user_id);

        $team->users()->attach($user);

        return response()->json(['message' => 'User added to team']);
    }

    public function removeUser($teamId, $userId)
    {
        $team = Team::findOrFail($teamId);
        $team->users()->detach($userId);

        return response()->json(['message' => 'User removed from team']);
    }
}
