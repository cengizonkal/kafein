<?php
/** @var App\Models\Item[] $items */

/** @var App\Models\Category $category */

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 mb-2">
                <h4>Ürünler @if($category)<small>{{$category->title}}</small>@endif</h4>
                <hr>
                <a href="{{action([\App\Http\Controllers\Admin\CategoryController::class,'create'])}}"
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


                                    </div>
                                </div>
                            </td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->category->title}}</td>
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

