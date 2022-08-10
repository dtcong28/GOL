@extends('main')
@section('content')

<div class="container pt-4">
    @if(empty($permission))
    <div class="row">
        <h3 class="col-4">{{ __('admin.Create Permission')}}</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="/admin/permission" style="color: white">{{ __('admin.admin.Back')}}</a>
        </button>

    </div>
    <form method="post" action="{{route('permission.store')}}">
        @else
        <div class="row">
            <h3 class="col-4">{{ __('admin.Edit Permission')}}</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="/admin/permission" style="color: white">{{ __('admin.Back')}}</a>
            </button>

        </div>
        <form method="post" action="{{route('permission.update',$permission->id)}}">
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
            <div class="form-group pt-3">
                <label>{{ __('admin.Name')}}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $permission->name ?? '') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label>{{ __('admin.Key')}}</label>
                <input type="text" class="form-control" name="key" value="{{ old('key', $permission->key ?? '') }}">
                @error('key')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @if(!empty($permissionGroups))
            <div class="form-group pt-3">
                <label>{{ __('admin.Select permission group')}}</label>
                <select class="form-select" name="permission_group_id">
                    @if(empty($permission))
                    <option selected>--{{ __('admin.Select permission group')}}--</option>
                    @endif
                    @foreach($permissionGroups as $permissionGroup)
                    <option value="{{$permissionGroup->id}}" <?php if (!empty($permission) && $permissionGroup->id == $permission->permission_group_id) echo "selected" ?>>{{$permissionGroup->name}}</option>
                    @endforeach
                </select>
                @error('permission_group_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @endif
            <div class="pt-4 text-center pb-5">
                <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">{{ __('admin.Save')}}
                </button>
            </div>
            @csrf
        </form>
</div>
@endsection