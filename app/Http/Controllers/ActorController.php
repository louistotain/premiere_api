<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActorCollection;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{

    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $Actors = Actor::with('movies')->get(['id', 'first_name', 'last_name']);
            return new ActorCollection($Actors);
        } else {
            abort('404');
        }
    }

    public function store(Request $request)
    {
        return Actor::create($request->all());
    }

    public function show($actor, Request $request)
    {
        if ($request->expectsJson()) {
            $Actors = Actor::with('movies')->get(['id', 'first_name', 'last_name'])->find($actor);
            return new ActorResource($Actors);
        } else {
            abort('404');
        }
    }

    public function update(Request $request, Actor $actor)
    {
        return Actor::all()->find($actor)->update($request->except('_token'));
    }

    public function destroy($actor)
    {
        Actor::find($actor)->movies()->detach();
        return Actor::destroy($actor);
    }

}
