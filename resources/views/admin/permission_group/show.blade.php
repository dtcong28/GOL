@extends('main')
@section('content')

    <div class="container pt-4">
        <div class="row">
            <h3 class="col-4">Permission Group</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="/admin/permission_group" style="color: white">Back</a>
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
                @if(!empty($permissionGroupById))
                        <tr>
                            <td>{{$permissionGroupById['id']}}</td>
                            <td>{{$permissionGroupById['name']}}</td>
                            <td>{{$permissionGroupById['created_at']}}</td>
                            <td>{{$permissionGroupById['updated_at']}}</td>
                        </tr>
                @endif
                </tbody>

            </table>
    </div>
@endsection
