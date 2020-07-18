<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index($imageable, $id)
    {
        $imageableClass = config('models.' . $imageable)::find($id);
        abort_if(!$imageableClass, 404);
        $images = $imageableClass->images;
        return view('admin/image_index')
            ->with('imageable', $imageable)
            ->with('imageableClass', $imageableClass)
            ->with('images', $images);
    }

    public function store(Request $request)
    {
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->forceDelete();
        return redirect()->back()->with('message', 'Resim Silindi');
    }
}
