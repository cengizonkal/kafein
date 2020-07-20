<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        /** @var Category[] $categories */
        $categories = Category::with('images')
            ->with('items')
            ->with('descendants.items')
            ->with('ancestors')
            ->get();

        return view('admin/category_index')
            ->with('categories', $categories);
    }

    public function create()
    {
        /** @var Category[] $categories */
        $categories = Category::with('ancestors')->get()->sortBy('title');
        return view('admin/category_create')
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect()->back()->with('message', 'Kategori ' . $category->title . ' oluşturuldu.');
    }

    public function edit(Category $category)
    {
        /** @var Category[] $categories */
        $categories = Category::all()->sortBy('title');
        return view('admin/category_edit')
            ->with('categories', $categories)
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect()->back()->with('message', 'Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'Silindi');
    }


}
