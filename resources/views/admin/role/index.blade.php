@extends('main')
@section('content')

<div class="container pt-5">
    <div>
        <div class="row">
            <h6 class="col-4">{{ __('role.Role List')}}</h6>
            <div class="col-6"></div>
            <button class="btn btn-primary col-1" style="width: 120px"><a href="{{route('role.create')}}" style="color: white">+ {{ __('button.Add new')}}</a>
            </button>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
        @endif
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{ __('label.Name')}}</th>
                    <th scope="col">{{ __('label.Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($roles))
                @foreach ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary btn-sm">{{ __('button.Edit')}}</a>
                        <a href="{{ route('role.show', $role->id) }}" class="btn btn-success btn-sm">{{ __('button.Show')}}</a>
                        <form class="d-inline" method="post" action="{{ route('role.destroy', $role->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"> {{ __('button.Delete')}} </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        {{ $roles->links() }}
    </div>

</div>
@endsection