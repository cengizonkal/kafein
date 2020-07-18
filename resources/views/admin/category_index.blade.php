<?php
/** @var App\Models\Category[] $categories */

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 mb-2">
                <h4>Kategoriler</h4>
                <hr>
                <a href="{{action([\App\Http\Controllers\Admin\CategoryController::class,'create'])}}"
                   class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Yeni Kategori Ekle</a>
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
                        <th>Üst</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($categories as $category)
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
                                           href="{{action([\App\Http\Controllers\Admin\CategoryController::class,'edit'],['category'=>$category->id])}}">Düzenle</a>
                                        <a class="dropdown-item"
                                           href="{{url("admin/categories/{$category->id}/items")}}">Ürünler
                                            <span class="badge badge-info">{{$category->items->count()}}</span>
                                        </a>
                                        <a class="dropdown-item"
                                           href="{{action([\App\Http\Controllers\Admin\ImageController::class,'index'],['imageable'=>'categories','id'=>$category->id])}}">Resimler
                                            <span class="badge badge-info">{{$category->images->count()}}</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form
                                            action="{{action([\App\Http\Controllers\Admin\CategoryController::class,'destroy'],['category'=>$category->id])}}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="dropdown-item" type="submit">Sil</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td>@isset($category->category){{$category->category->title}}@endisset</td>
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

