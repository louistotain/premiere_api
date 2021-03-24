<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return new CategoryCollection(Category::all());
        } else {
            abort('404');
        }
    }

    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    public function show($Category, Request $request)
    {
        if ($request->expectsJson()) {
            return new CategoryResource(Category::find($Category));
        } else {
            abort('404');
        }
    }

    public function update(Request $request, Category $Category)
    {
        return Category::all()->find($Category)->update($request->except('_token'));
    }

    public function destroy($Category)
    {
        return Category::destroy($Category);
    }

}
