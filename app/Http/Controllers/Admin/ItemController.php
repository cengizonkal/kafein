<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Category $category = null)
    {
        if ($category) {
            $categories = $category->descendants()->pluck('id');
            $categories[] = $category->getKey();
            $items = Item::with('category.ancestors')->with('images')->whereIn('category_id', $categories)->get();
        } else {
            $items = Item::with('category.ancestors')->with('images')->get();
        }
        return view('admin/item_index')
            ->with('category', $category)
            ->with('items', $items);
    }

    public function edit(Item $item)
    {
    }

    public function store(Request $request)
    {

    }
}
