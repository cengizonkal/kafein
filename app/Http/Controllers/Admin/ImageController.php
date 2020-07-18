<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function store($imageable, $id, Request $request)
    {
        $imageableInstance = config('models.' . $imageable)::find($id);
        abort_if(!$imageableInstance, 404);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $temporaryPath = $request->file('image');
            $realName = $request->file('image')->getClientOriginalName();
            $randomName = Str::random();
            $imageRelativePath = 'images/' . $imageable . '/' . $randomName . '.png';
            $imageRelativeThumbnailPath = 'images/' . $imageable . '/' . $randomName . '_t.png';

            $imagePath = public_path($imageRelativePath);
            \Intervention\Image\Facades\Image::make($temporaryPath)->resize(
                config('image.width'),
                config('image.height'),
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save($imagePath);

            \Intervention\Image\Facades\Image::make($temporaryPath)->resize(
                config('image.thumbnail.width'),
                config('image.thumbnail.height'),
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save($imageRelativeThumbnailPath);
            $imageableInstance->images()->create(
                [
                    'path' => $imageRelativePath,
                    'thumbnail' => $imageRelativeThumbnailPath,
                    'width' => config('image.category.width'),
                    'height' => config('image.category.height'),
                    'original_name' => $realName
                ]
            );
        }
        return redirect()->back()->with('message', 'Resim Eklendi');
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->forceDelete();
        return redirect()->back()->with('message', 'Resim Silindi');
    }
}
