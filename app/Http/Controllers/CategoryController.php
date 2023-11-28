<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'slug' => ['required', 'min:3', Rule::unique('categories', 'slug')],
        ]);

        Category::create($attributes);

        return back()->with(['success' => 'The category has been created']);
    }


}
