<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            $Movies = Movie::with('actors')->get(['id', 'title', 'categories_id']);
            return new MovieCollection($Movies);
        } else {
            abort('404');
        }
    }

    public function store(Request $request)
    {

        $movie = Movie::create($request->all());

        foreach ($request->actors as $actor) {
            $movie->actors()->attach($actor);
        }

        return $movie;
    }

    public function show($Movie, Request $request)
    {
        if ($request->expectsJson()) {
            $Movies = Movie::with('actors')->get(['id', 'title', 'categories_id'])->find($Movie);
            return new MovieResource($Movies);
        } else {
            abort('404');
        }
    }

    public function update(Request $request, Movie $Movie)
    {
        return Movie::all()->find($Movie)->update($request->except('_token'));
    }

    public function destroy($Movie)
    {
        Movie::find($Movie)->actors()->detach();
        return Movie::destroy($Movie);
    }

}
