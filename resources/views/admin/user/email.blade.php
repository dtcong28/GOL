@extends('main')
@section('content')
<div class="container pt-4">
    <div class="row">
        <h3 class="col-4">@lang('Send email to user')</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="/admin/user" style="color: white">@lang('Back')</a>
        </button>

    </div>
    @if (session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(!empty($users))
    <form action="{{route('send')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group pt-3">
            <select name="email" class="form-select" required>
                <option selected value="all_user">@lang('All user')</option>
                @foreach($users as $user)
                <option value="{{$user['email']}}">{{$user['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 pt-3">
            <label class="form-label">@lang('Attach file')</label>
            <input class="form-control" type="file" id="attachment" name="attachment">
        </div>
        <div class="pt-4 text-center pb-5">
            <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">
                @lang('Send')
            </button>
        </div>
    </form>
    @else
    <div class="alert alert-danger text-center">
        @lang('No user data')
    </div>
    @endif
</div>
@endsection