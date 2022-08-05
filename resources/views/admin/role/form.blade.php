@extends('main')
@section('content')

<div class="container pt-4">
    @if(empty($role))
    <div class="row">
        <h3 class="col-4">Create Role</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="{{route('role.index')}}" style="color: white">Back</a>
        </button>

    </div>
    <form method="post" action="{{route('role.store')}}">
        @else
        <div class="row">
            <h3 class="col-4">Edit Role</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="{{route('role.index')}}" style="color: white">Back</a>
            </button>

        </div>
        <form method="post" action="{{route('role.update',$role->id)}}">
            @method('PUT')
            @endif
            @if ($errors->any())
            <div class="alert alert-danger text-center ">
                Vui lòng kiểm tra lại dữ liệu
            </div>
            @endif
            @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $role->name ?? '') }}">
                @error('name')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-4 text-center pb-5">
                <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">Save
                </button>
            </div>
            @csrf
        </form>
</div>
@endsection