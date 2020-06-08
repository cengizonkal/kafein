@extends('layouts.app')

@section('content')
    <div class="container">
        <table id="test" class="table table-responsive table-bordered table-striped">
            <thead>
            <th>id</th>
            </thead>
            <tbody>
            <tr>
                <td>2</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        window.addEventListener('load', function () {
            console.log('a');
            $('#test').DataTable();
        })
    </script>
@endpush
