@extends('main')
@section('content')

<div class="container pt-4">
    @if(empty($category))
    <div class="row">
        <h3 class="col-4">{{ __('category.Create category')}}</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="/admin/category" style="color: white">{{ __('button.Back')}}</a>
        </button>

    </div>
    <form method="post" action="{{route('category.store')}}">
        @elseif(isset($act))
        <div class="row">
            <h3 class="col-4">{{ __('category.Show category')}}</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="/admin/category" style="color: white">{{ __('button.Back')}}</a>
            </button>

        </div>
        <form method="post">
            @else
            <div class="row">
                <h3 class="col-4">{{ __('category.Edit category')}}</h3>
                <div class="col-6"></div>
                <button class="btn btn-primary" style="width: 100px"><a href="/admin/category" style="color: white">{{ __('button.Back')}}</a>
                </button>

            </div>
            <form method="post" action="{{route('category.update',$category->id)}}">
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
                <div class="form-group pt-3">
                    <label>{{ __('category.Name')}}</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group pt-3">
                    <label>{{ __('category.Slug')}}</label>
                    <input type="text" class="form-control" name="slug" value="{{ old('slug', $category->slug ?? '') }}" <?php if ((isset($act))) echo 'readonly' ?>>
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @if(isset($act))
                <div class="form-group">
                    <label>{{ __('label.Created at')}}</label>
                    <input type="text" class="form-control" name="create_at" value="{{ $category['created_at']}}" readonly>
                </div>
                <div class="form-group">
                    <label>{{ __('label.Updated at')}}</label>
                    <input type="text" class="form-control" name="updated_at" value="{{ $category['updated_at']}}" readonly>
                </div>
                @endif
                @if(!isset($act))
                <div class="pt-4 text-center pb-5">
                    <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">{{ __('button.Save')}}
                    </button>
                </div>
                @endif
                @csrf
            </form>
</div>
@endsection