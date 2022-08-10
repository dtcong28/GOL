@extends('main')
@section('content')

<div class="container pt-4">
    @if(empty($permissionGroup))
    <div class="row">
        <h3 class="col-4">{{ __('admin.Create Permission Group')}}</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="/admin/permission-group" style="color: white">{{ __('admin.Back')}}</a>
        </button>

    </div>
    <form method="post" action="{{route('permission-group.store')}}">
        @else
        <div class="row">
            <h3 class="col-4">{{ __('admin.Edit Permission Group')}}</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="/admin/permission-group" style="color: white">{{ __('admin.Back')}}</a>
            </button>

        </div>
        <form method="post" action="{{route('permission-group.update',$permissionGroup->id)}}">
            @method('PUT')
            @endif
            @if ($errors->any())
            <div class="alert alert-danger text-center ">
                {{ __('admin.Please double check the data')}}
            </div>
            @endif
            @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="form-group">
                <label>{{ __('admin.Name')}}</label>
                @if(empty($permissionGroup))
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @else
                <input type="text" class="form-control" name="name" value="{{ $permissionGroup['name'] }}">
                @endif
                @error('name')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="pt-4 text-center pb-5">
                <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">{{ __('admin.Save')}}
                </button>
            </div>
            @csrf
        </form>
</div>
@endsection