<?php
/** @var App\Models\Category[] $categories */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table id="item-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
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
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{action([\App\Http\Controllers\Admin\CategoryController::class,'edit'],['category'=>$category->id])}}">Düzenle</a>
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

