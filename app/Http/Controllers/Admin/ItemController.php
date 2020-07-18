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
            $items = $category->items;
        } else {
            $items = Item::all();
        }

        return view('admin/item_index')
            ->with('items', $items);
    }
}
