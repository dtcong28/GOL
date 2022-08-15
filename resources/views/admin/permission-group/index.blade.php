@extends('main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('permission_group.Permission Group List')}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="container pt-1">
    <div>
        <div class="row">
            <button class="btn btn-primary btn-sm" style="width: 120px"><a href="/admin/permission-group/create" style="color: white">+ {{ __('button.Add new')}}</a>
            </button>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{ __('label.Name')}}</th>
                    <th scope="col">{{ __('label.Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($permissionGroups))
                @foreach ($permissionGroups as $permissionGroup)
                <tr>
                    <td>{{$permissionGroup['id']}}</td>
                    <td>{{$permissionGroup['name']}}</td>
                    <td>
                        <a href="{{ route('permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary btn-sm">{{ __('button.Edit')}}</a>
                        <a href="{{ route('permission-group.show', $permissionGroup->id) }}" class="btn btn-success btn-sm">{{ __('button.Show')}}</a>
                        <form class="d-inline" method="post" action="{{ route('permission-group.destroy', $permissionGroup->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"> {{ __('button.Delete') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>

        @if(!empty($permissionGroups))
        {{ $permissionGroups->links() }}
        @endif

    </div>
    @endsection