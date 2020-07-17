<?php
/**@var \App\Models\Image[]|\Illuminate\Support\Collection $images */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <form action="{{action([\App\Http\Controllers\Admin\CategoryImageController::class,'store'],['category'=>$category->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label></label>
                    <input type="file" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-success">Ekle</button>
            </form>
        </div>
    </div>
    <div class="container">
        @foreach($images as $image)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="">
                    <div class="card-body">
                        <p class="card-text"></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-danger">Sil</button>

                            </div>
                            <small class="text-muted">{{$image->original_name}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
