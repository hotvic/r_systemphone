<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Category;

class CategoriesController extends Controller
{
    public function list()
    {
        return view('shop.admin.categories.list')
            ->with('categories', Category::all());
    }

    public function showNewForm()
    {
        return view('shop.admin.categories.new');
    }

    public function new(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|unique:categories,slug',
            'title'  => 'required'
        ]);

        Category::create([
            'slug' => $request->input('slug'),
            'title' => $request->input('title'),
        ]);

        $request->session()->flash('success', true);

        return redirect()->route('shop.admin.categories.list');
    }
}
