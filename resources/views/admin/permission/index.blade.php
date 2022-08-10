@extends('main')
@section('content')

<div class="container pt-5">
    <div>
        <div class="row">
            <h6 class="col-4">@lang('Permission List')</h6>
            <div class="col-6"></div>
            <button class="btn btn-primary col-1" style="width: 120px"><a href="{{ route('permission.create') }}" style="color: white">+ @lang('Add new')</a>
            </button>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Action')</th>
                </tr>
            </thead>
            <tbody>

                @if(!empty($permissions))
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{$permission['id']}}</td>
                    <td>{{$permission['name']}}</td>
                    <td>
                        <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary btn-sm">@lang('Edit')</a>
                        <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-success btn-sm">@lang('Show')</a>
                        <form class="d-inline" method="post" action="{{ route('permission.destroy', $permission->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">@lang('Delete')  </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        {{ $permissions->links() }}
    </div>

</div>
@endsection