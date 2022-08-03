@extends('main')
@section('content')

    <div class="container pt-4">
        <div class="row">
            <h3 class="col-4">Create a User</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="/admin/user" style="color: white">Back</a>
            </button>

        </div>
        <form method="post" action="{{route('user.store')}}">
            @if($errors->any())
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
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label>Email </label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="row pt-3">
                <div class="form-group col">
                    <label>Password </label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    @error('password')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Password confirm </label>
                    <input type="password" class="form-control" name="password_confirm" value="{{ old('password_confirm') }}">
                    @error('password_confirm')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group pt-3">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
            <div class="form-group pt-3">
                <label>Facebook link</label>
                <input type="text" class="form-control" name="facebook" placeholder="https://example.com"  value="{{ old('facebook') }}">
                @error('facebook')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label>Youtube</label>
                <input type="text" class="form-control" name="youtube" placeholder="https://example.com" value="{{ old('youtube') }}">
                @error('youtube')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="pt-4 text-center pb-5">
                <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">Save
                </button>
                <button type="submit" class="btn btn-secondary rounded-pill" style="margin-left: 7px; width: 90px">
                    Reset
                </button>
            </div>
            @csrf
        </form>
    </div>
@endsection
