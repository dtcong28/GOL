@extends('main')
@section('content')

<div class="container pt-5">
    <div>
        <div class="row">
            <h6 class="col-4">Permission Group List</h6>
            <div class="col-6"></div>
            <button class="btn btn-primary col-1" style="width: 120px"><a href="/admin/permission-group/create" style="color: white">+ Add new</a>
            </button>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($permissionGroups))
                @foreach ($permissionGroups as $permissionGroup)
                <tr>
                    <td>{{$permissionGroup['id']}}</td>
                    <td>{{$permissionGroup['name']}}</td>
                    <td>
                        <a href="{{ route('permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('permission-group.show', $permissionGroup->id) }}" class="btn btn-success btn-sm">Show</a>
                        <form class="d-inline" method="post" action="{{ route('permission-group.destroy', $permissionGroup->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>

        {{ $permissionGroups->links() }}





    </div>
    @endsection