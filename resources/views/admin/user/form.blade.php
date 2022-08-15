@extends('main')
@section('content')
<div class="container pt-4">
    <div class="row">
        @if(empty($user))
        <h3 class="col-4">{{ __('user.Create a User')}}</h3>
        @elseif(isset($act))
        <h3 class="col-4">{{ __('user.Show user')}}</h3>
        @else
        <h3 class="col-4">{{ __('user.Edit user')}}</h3>
        @endif
        <div class="col-6"></div>
        <button class="btn btn-primary btn-sm" style="width: 100px"><a href="/admin/user" style="color: white">{{ __('button.Back')}}</a>
        </button>

    </div>

    @if(empty($user))
    <form method="post" action="{{route('user.store')}}">
        @elseif(isset($act))
        <form method="post">
            @else
            <form method="post" action="{{route('user.update',$user->id)}}">
                @method('PUT')
                @endif
                @if ($errors->any())
                <div class="alert alert-danger text-center ">
                    {{ __('message.Please double check the data')}}
                </div>
                @endif
                @if (session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('label.Name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Email </label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                        @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Username </label>
                        <input type="text" class="form-control" name="username" value="{{ old('username', $user->username ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                        @error('username')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @php
                $selectedRoles = collect(old('role_ids', empty($user) ? [] : $user->roles->pluck('id')->all()));
                @endphp
                <div class="row">
                    <div class="form-group">
                        <label> {{ __('user.role') }} </label>
                        @if(!empty($roles))
                        @foreach($roles as $role)
                        <div class="form-check form-check-inline pl-3">
                            <input class="form-check-input" type="radio" name="role_ids[]" value="{{ $role->id }}" {{ ($selectedRoles->contains($role->id)) ? 'checked' : '' }} <?php if (isset($act)) echo 'disabled' ?>>
                            <label class="form-check-label">{{ $role->name }}</label>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('user.Social Name')}}</label>
                        <input type="text" class="form-control" name="social_name" value="{{ old('social_name', $user->social_name ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    </div>
                    <div class="form-group col">
                        <label>{{ __('user.Social Nickname')}}</label>
                        <input type="text" class="form-control" name="social_nickname" value="{{ old('social_nickname', $user->social_nickname ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    </div>
                    <div class="form-group col">
                        <label>{{ __('user.Social Avatar')}}</label>
                        <input type="text" class="form-control" name="social_avatar" value="{{ old('social_avatar', $user->social_avatar ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    </div>
                </div>
                @if(!isset($act))
                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('user.Password')}} </label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        @error('password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>{{ __('user.Password confirm')}} </label>
                        <input type="password" class="form-control" name="password_confirm" value="{{ old('password_confirm') }}">
                        @error('password_confirm')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('user.Address')}}</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address', $user->address ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    </div>
                    <div class="form-group col">
                        <label>{{ __('user.School')}}</label>
                        <input type="text" class="form-control" name="school_id" value="{{ '' }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('user.Parent')}}</label>
                        <input type="text" class="form-control" name="parent_id" value="{{ '' }}" readonly>
                    </div>
                    <div class="form-group col">
                        <label>{{ __('user.Code')}}</label>
                        <input type="text" class="form-control" name="code" value="{{ old('code', $user->code ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>{{ __('user.Social Type')}}</label>
                        <input type="number" class="form-control" name="social_type" value="{{ old('social_type', $user->social_type ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    </div>
                    <div class="form-group col">
                        <label>{{ __('user.Social ID')}}</label>
                        <input type="text" class="form-control" name="social_id" value="{{ old('social_id' , $user->social_id ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('label.Description')}}</label>
                    <textarea class="form-control" name="description" rows="3" <?php if ((isset($act))) echo 'readonly' ?>>{{ old('description' , $user->description ?? '') }}</textarea>
                </div>
                <div class="pt-1 text-center pb-5">
                    @if(!isset($act))
                    <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">{{ __('button.Save')}}
                    </button>
                    @endif
                    @if(empty($user))
                    <button type="reset" class="btn btn-secondary rounded-pill" style="margin-left: 7px; width: 90px">
                        {{ __('button.Reset')}}
                    </button>
                    @endif
                </div>
                @csrf
            </form>
</div>
@endsection