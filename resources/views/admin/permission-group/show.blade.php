@extends('main')
@section('content')

<div class="container pt-4">
    <div class="row">
        <h3 class="col-4">Permission Group</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="/admin/permission-group" style="color: white">Back</a>
        </button>

    </div>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($permissionGroup))
            <tr>
                <td>{{$permissionGroup['id']}}</td>
                <td>{{$permissionGroup['name']}}</td>
                <td>{{$permissionGroup['created_at']}}</td>
                <td>{{$permissionGroup['updated_at']}}</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
@endsection