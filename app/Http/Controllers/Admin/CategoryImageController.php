<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryImageController extends Controller
{
    public function index(Category $category)
    {
        $images = $category->images;
        return view('admin/category_image_index')
            ->with('category', $category)
            ->with('images', $images);
    }
}
