<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show Categories
    public function show() {
        return view('categories.show', [
            'categories' => Category::latest()->paginate(6)
        ]);
    }

    // Show Create Form
    public function create() {
        return view('categories.create');
    }

    // Store Category Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        Category::create($formFields);

        return redirect('/')->with('message', 'Category created successfully!');
    }
}
