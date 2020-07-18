<?php
/**@var \App\Models\Image[]|\Illuminate\Support\Collection $images */

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <form class="form-inline"
                  action="{{action([\App\Http\Controllers\Admin\ImageController::class,'store'],['imageable'=>$imageable,'id'=>$imageableClass->id])}}"
                  method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label></label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-success btn-sm">Ekle</button>
            </form>
        </div>
    </div>
    <div class=""><br></div>
    <div class="container">
        <div class="row">
            @foreach($images as $image)

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="{{url($image->url)}}" target="_blank">
                            <img src="{{$image->thumbnail_url}}" class="img-thumbnail rounded mx-auto d-block"
                                 style="width: 150px;height: 100%">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{$image->original_name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form
                                    action="{{action([\App\Http\Controllers\Admin\ImageController::class,'destroy'],['image'=>$image->id])}}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group">
                                        <a href="{{url($image->url)}}" target="_blank"
                                           class="btn btn-sm btn-outline-secondary">Göster</a>
                                        <button type="submit" class="btn btn-sm btn-outline-danger swal-form-confirm"
                                                data-message="Bu resmi siliyorsunuz ">Sil
                                        </button>
                                    </div>
                                </form>
                                <small class="text-muted">{{$image->id}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
