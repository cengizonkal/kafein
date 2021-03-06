<?php
/** @var App\Models\Category[] $categories */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Yeni Ürün Oluştur</h2>
                <hr>
                <form method="post"
                      action="{{action([\App\Http\Controllers\Admin\ItemController::class,'store'])}}">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id"
                                class="form-control select2 @error('category_id') is-invalid @enderror"
                                required>
                            @foreach($categories as $cat)
                                <option
                                    value="{{$cat->id}}"
                                    @if($cat->id==old('category_id')) selected @endif>{{$cat->getFullName()}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Adı</label>
                        <input id="title" type="text" name="title"
                               value="{{old('title')}}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Lütfen bir ürün adı giriniz"
                               required>
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <textarea id="description" name="description"
                                  class="form-control @error('description') is-invalid @enderror">
                               {{old('description')}}
                        </textarea>
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Fiyat</label>
                        <input id="price" type="number" name="price"
                               value="{{old('price')}}"
                               class="form-control @error('price') is-invalid @enderror"
                               placeholder="Lütfen bir ürün fiyatı giriniz"
                               required>
                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_available">Mevcut</label>
                        <input id="is_available" type="checkbox" name="is_available"
                               value="{{old('is_available')}}"
                               class="form-check @error('is_available') is-invalid @enderror">
                        @error('is_available')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Oluştur</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

@endpush



