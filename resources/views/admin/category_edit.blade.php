<?php
/** @var App\Models\Category $category */

/** @var App\Models\Category[] $categories */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>{{$category->title}} Kategorisini Güncelle</h2>
                <hr>
                <form method="post"
                      action="{{action([\App\Http\Controllers\Admin\CategoryController::class,'update'],['category'=>$category->id])}}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="category_id">Üst Kategori</label>
                        <select name="category_id" id="category_id"
                                class="form-control select2 @error('category_id') is-invalid @enderror">
                            <option value="">---</option>
                            @foreach($categories as $cat)
                                <option
                                    value="{{$cat->id}}"
                                    @if($cat->id==$category->category_id) selected @endif>{{$cat->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Adı</label>
                        <input id="title" type="text" name="title"
                               value="{{$category->title}}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Lütfen bir kategori adı giriniz"
                               required>
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush


