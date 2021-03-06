<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\OptionGroup;
use Illuminate\Http\Request;

class OptionGroupController extends Controller
{

    public function index(Item $item)
    {
        return view('admin/option_group_index')
            ->with('item', $item);
    }


    public function create(Item $item)
    {
        //
    }


    public function store(Request $request, Item $item)
    {
        //
    }


    public function show(Item $item, OptionGroup $optionGroup)
    {
        //
    }


    public function edit(Item $item, OptionGroup $optionGroup)
    {
        return view('admin/option_group_edit')
            ->with('item', $item)
            ->with('optionGroup', $optionGroup);
    }


    public function update(Request $request, Item $item, OptionGroup $optionGroup)
    {
        $optionGroup->fill($request->all());
        $optionGroup->is_multiple = $request->has('is_multiple');
        $optionGroup->save();
        return redirect()->back()->with('message', $optionGroup->title . ' Güncellendi');
    }


    public function destroy(Item $item, OptionGroup $optionGroup)
    {
        //
    }
}
