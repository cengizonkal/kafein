<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class OptionGroupController extends Controller
{
    public function index(Item $item)
    {
        return view('admin/item/option_group_index')
            ->with('item', $item);
    }
}
