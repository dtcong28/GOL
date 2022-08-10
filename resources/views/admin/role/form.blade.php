@extends('main')
@section('content')

<div class="container pt-4">
    @if(empty($role))
    <div class="row">
        <h3 class="col-4">@lang('Create Role')</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="{{route('role.index')}}" style="color: white">@lang('Back')</a>
        </button>

    </div>
    <form method="post" action="{{route('role.store')}}">
        @elseif(isset($act))
        <div class="row">
            <h3 class="col-4">@lang('Show Role')</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="{{route('role.index')}}" style="color: white">@lang('Back')</a>
            </button>

        </div>
        <form method="post">
            @else
            <div class="row">
                <h3 class="col-4">@lang('Edit Role')</h3>
                <div class="col-6"></div>
                <button class="btn btn-primary" style="width: 100px"><a href="{{route('role.index')}}" style="color: white">@lang('Back')</a>
                </button>

            </div>
            <form method="post" action="{{route('role.update',$role->id)}}">
                @method('PUT')
                @endif
                @if ($errors->any())
                <div class="alert alert-danger text-center ">
                    @lang('Please double check the data')
                </div>
                @endif
                @if (session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="form-group">
                    <label>@lang('Name')</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $role->name ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    @error('name')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                @php
                $selected = collect([]);
                if (!empty(old('permission_ids'))) {
                $selected = collect(old('permission_ids', []));
                } else if (!empty($role)) {
                $selected = $role->permissions;
                }
                @endphp
                <div class="col mt-4">
                    <label>@lang('Permission groups')</label>
                    @foreach( $permissionGroups as $permissionGroup)
                    <div class="border border-dark p-1 rounded mt-2">
                        <div class="row">
                            <h6>{{$permissionGroup->name}}</h6>
                        </div>
                        @foreach ($permissionGroup->permissions as $permission)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="permission_ids[]" value="{{$permission->id}}" {{ ($selected->contains($permission->id)) ? 'checked' : '' }} <?php if (isset($act)) echo 'disabled' ?>>
                            <label class="form-check-label">{{$permission->name}}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                @if(!isset($act))
                <div class="pt-4 text-center pb-5">
                    <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">@lang('Save')
                    </button>
                </div>
                @else
                <div class="form-group">
                    <label>@lang('Created at')</label>
                    <input type="text" class="form-control" name="create_at" value="{{ $role['created_at']}}" readonly>
                </div>
                <div class="form-group">
                    <label>@lang('Updated at')</label>
                    <input type="text" class="form-control" name="updated_at" value="{{ $role['updated_at']}}" readonly>
                </div>
                @endif
                @csrf
            </form>
</div>
@endsection