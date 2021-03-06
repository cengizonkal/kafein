<?php
/** @var App\Models\Item[] $items */

/** @var App\Models\Category $category */

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 mb-2">
                <h4>@if($category){{$category->title}} Kategorisi Altındaki @endif Ürünler </h4>
                <hr>
                <a href="{{action([\App\Http\Controllers\Admin\ItemController::class,'create'])}}"
                   class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Yeni Ürün Ekle</a>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-12">
                <table id="item-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%"></th>
                        <th>ID</th>
                        <th>ADI</th>
                        <th>Fiyat</th>
                        <th>Kategori</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{action([\App\Http\Controllers\Admin\ItemController::class,'edit'],['item'=>$item->id])}}">Düzenle</a>
                                        <a class="dropdown-item"
                                           href="{{action([\App\Http\Controllers\Admin\ImageController::class,'index'],['imageable'=>'items','id'=>$item->id])}}">Resimler
                                            <span class="badge badge-info">{{$item->images->count()}}</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form
                                            action="{{action([\App\Http\Controllers\Admin\ItemController::class,'destroy'],['item'=>$item->id])}}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="dropdown-item" type="submit">Sil</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->category->getFullName()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        window.addEventListener('load', function () {
            $('#item-table').DataTable();
        })
    </script>
@endpush

