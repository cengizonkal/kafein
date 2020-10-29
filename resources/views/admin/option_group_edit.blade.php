<?php
/** @var App\Models\Item $item */

/** @var App\Models\OptionGroup $optionGroup */
?>
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{$optionGroup->title}} Güncelle </h2>
                <hr>
                <small>
                    <a href="{{action([\App\Http\Controllers\Admin\OptionGroupController::class,'index'],['item'=>$item->id])}}"
                       class="btn btn-info btn-sm"><i class="fa fa-backward"></i> Geri Dön</a>
                </small>
                <form method="post"
                      action="{{action([\App\Http\Controllers\Admin\OptionGroupController::class,'update'],['item'=>$item->id,'optionGroup'=>$optionGroup->id])}}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Adı</label>
                        <input id="title" type="text" name="title"
                               value="{{$optionGroup->title}}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Lütfen bir Grup adı giriniz"
                               required>
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_multiple">Birden fazla seçilebilir</label>
                        <input id="is_multiple" type="checkbox" name="is_multiple"
                               @if($optionGroup->is_multiple) checked @endif
                               class="form-check @error('is_multiple') is-invalid @enderror">
                        @error('is_multiple')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Güncelle</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

@endpush


