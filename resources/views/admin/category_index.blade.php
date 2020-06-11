<?php
/** @var App\Models\Category[] $categories */
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table id="item-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>ADI</th>
                </tr>

                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </td>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

