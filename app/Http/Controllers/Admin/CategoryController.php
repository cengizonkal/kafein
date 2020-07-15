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
        $categories = Category::all();
        return view('admin/category_index')
            ->with('categories', $categories);
    }

    public function create()
    {
        /** @var Category[] $categories */
        $categories = Category::all()->sortBy('title');
        return view('admin/category_create')
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->category_id = $request->category_id;
        $category->save();

        $this->uploadImage($request, $category);
        return redirect()->back()->with('message', 'Kategori ' . $category->title . ' oluşturuldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
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
        $this->uploadImage($request, $category);
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
        $category->forceDelete();
        return redirect()->back()->with('message', 'Silindi');
    }

    /**
     * @param Request $request
     * @param Category $category
     */
    private function uploadImage(Request $request, Category $category): void
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $temporaryPath = $request->file('image');
            $realName = $request->file('image')->getClientOriginalName();
            $imagePath = public_path('images/categories/' . $category->id . '.png');
            Image::make($temporaryPath)->resize(
                config('image.category.width'),
                config('image.category.height'),
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save($imagePath);
            $category->image()->create(
                [
                    'path' => $imagePath,
                    'width' => config('image.category.width'),
                    'height' => config('image.category.height'),
                    'original_name' => $realName
                ]
            );
        }
    }
}
