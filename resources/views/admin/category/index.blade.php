@extends('main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('category.Category list')}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="container pt-1">
    <div>
        <div class="row">
        
            <button class="btn btn-primary btn-sm" style="width: 120px"><a href="{{ route('category.create') }}" style="color: white">+ {{ __('button.Add new')}}</a>
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

                @if(!empty($categories))
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category['id']}}</td>
                    <td>{{$category['name']}}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">{{ __('button.Edit')}}</a>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-success btn-sm">{{ __('button.Show')}}</a>
                        <form class="d-inline" method="post" action="{{ route('category.destroy', $category->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{ __('button.Delete')}}  </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        @if(!empty($categories))
        {{ $categories->links() }}
        @endif
    </div>

</div>
@endsection