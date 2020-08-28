<?php
/** @var App\Models\Item $item */

?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 mb-2">
                <h4>Ürün {{$item->title}} Seçenekleri</h4>
                <hr>
                <a href="{{action([\App\Http\Controllers\Admin\Item\OptionGroupController::class,'create'])}}"
                   class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Yeni Grup Ekle</a>
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
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($item->optionGroups as $optionGroup)
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
                                           href="{{action([\App\Http\Controllers\Admin\Item\OptionGroupController::class,'edit'],['category'=>$category->id])}}">Düzenle</a>
                                        <div class="dropdown-divider"></div>
                                        <form
                                            action="{{action([\App\Http\Controllers\Admin\Item\OptionGroupController::class,'destroy'],['category'=>$category->id])}}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="dropdown-item" type="submit">Sil</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                            <td>{{$optionGroup->id}}</td>
                            <td>{{$optionGroup->title}}</td>
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
            $('#item-table').DataTable({
                "order": [[ 1, "desc" ]]
            });
        })
    </script>
@endpush


