<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->orderBy('pagetitle')->get();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
        $category->pagetitle = $request->pagetitle;
        $category->alias = $request->alias;
        $category->introtext = $request->introtext;
        $category->save();
        return redirect(route('admin.categories.index'))->with('category-created', '');
    }

    public function edit($category)
    {
        $category = Category::withCount('posts')->findOrFail($category);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoryUpdateRequest $request, $category)
    {
        $category = Category::findOrFail($category);
        $category->pagetitle = $request->pagetitle;
        $category->alias = $request->alias;
        $category->introtext = $request->introtext;
        $category->update();
        return redirect(route('admin.categories.index'))->with('category-updated', '');
    }


    public function destroy($category)
    {
        $category = Category::findOrFail($category);
        $category->delete();
        return redirect(route('admin.categories.index'))->with('category-destroyed', '');
    }
}
