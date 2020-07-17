<?php
/**@var \App\Models\Image[]|\Illuminate\Support\Collection $images */

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <form
                action="{{action([\App\Http\Controllers\Admin\ImageController::class,'store'],['imageable'=>$imageable,'id'=>$imageableClass->id])}}"
                method="post" enctype="multipart/form-data">
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
        <div class="row">
            @foreach($images as $image)

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{$image->full_path}}" class="img-thumbnail rounded mx-auto d-block"
                             style="width: 150px;height: 100%">
                        <div class="card-body">
                            <p class="card-text"></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{action([\App\Http\Controllers\Admin\ImageController::class,'destroy'],['image'=>$image->id])}}">
                                    <div class="btn-group">
                                        <a href="{{url($image->full_path)}}" target="_blank"
                                           class="btn btn-sm btn-outline-secondary">Göster</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Sil</button>
                                    </div>
                                </form>
                                <small class="text-muted">{{$image->original_name}}</small>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection