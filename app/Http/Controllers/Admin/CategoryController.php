<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->where('published', 1)->whereNull('parent_id')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['string', 'required'],
            'parent_id' => ['integer', 'nullable', 'exists:categories,id'],
            'description' => ['string', 'nullable'],
            'slug' => ['string', 'unique:categories,slug'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'.'max:2048'],
            'published' => ['boolean', 'required'],
        ]);
        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }
}
