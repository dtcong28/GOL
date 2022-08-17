@extends('main')
@section('content')
<div class="container pt-4">
    @if(empty($question))
    <div class="row">
        <h3 class="col-4">{{ __('question.Create Question')}}</h3>
        <div class="col-6"></div>
        <button class="btn btn-primary" style="width: 100px"><a href="{{route('question.index')}}" style="color: white">{{ __('button.Back')}}</a>
        </button>

    </div>
    <form method="post" action="{{route('question.store')}}">
        @elseif(isset($act))
        <div class="row">
            <h3 class="col-4">{{ __('question.Show Question')}}</h3>
            <div class="col-6"></div>
            <button class="btn btn-primary" style="width: 100px"><a href="{{route('question.index')}}" style="color: white">{{ __('button.Back')}}</a>
            </button>

        </div>
        <form method="post">
            @else
            <div class="row">
                <h3 class="col-4">{{ __('question.Edit Question')}}</h3>
                <div class="col-6"></div>
                <button class="btn btn-primary" style="width: 100px"><a href="{{route('question.index')}}" style="color: white">{{ __('button.Back')}}</a>
                </button>

            </div>
            <form method="post" action="{{route('question.update',$question->id)}}">
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
                <div class="form-group">
                    <label>{{ __('label.Content')}}</label>
                    <textarea class="form-control" name="content" rows="3" <?php if ((isset($act))) echo 'readonly' ?>>{{ old('content' , $question['content'] ?? '') }}</textarea>
                </div>
                @php
                $selected = '';
                if (!empty(old('category_id'))) {
                $selected = old('category_id');
                } else if (!empty($question)) {
                $selected = $question->category_id;
                }
                @endphp
                @if(!empty($categories))
                <div class="form-group pt-3">
                    <label>{{ __('question.Select category')}}</label>
                    <select class="form-select" name="category_id">
                        @if(empty($question))
                        <option selected>--{{ __('question.Select category')}}--</option>
                        @endif
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"  {{ ($selected == $category->id) ? 'selected' : '' }} >{{$category->name}} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    
                    @for($i=0;$i < 4; $i++) <div class="form-group">
                        <label>{{ __('label.Answer')}} {{$i+1}}</label>
                        <div class="row">
                            <textarea class="form-control col-10" name="answer[]" rows="2" {{(isset($act)) ? 'readonly' : ''}} >{{(isset($question)) ? $question->answers[$i]->content : ''}}</textarea>
                            <input style="height: 30px;" type="radio" class="col-2" name="radio-answer" id="radio-{{$i}}" value="{{$i}}" {{( isset($question) AND $question->answers[$i]->correct == 1) ? 'checked' : ''}} />
                        </div>
                        @endfor
                </div>
</div>
@endif
@if(!isset($act))
<div class="pt-4 text-center pb-5">
    <button type="submit" class="btn btn-primary rounded-pill" style="margin-right: 7px; width: 90px">{{ __('button.Save') }}
    </button>
</div>
@else
<div class="form-group">
    <label>{{ __('label.Created at')}}</label>
    <input type="text" class="form-control" name="create_at" value="{{ $question['created_at']}}" readonly>
</div>
<div class="form-group">
    <label>{{ __('label.Updated at')}}</label>
    <input type="text" class="form-control" name="updated_at" value="{{ $question['updated_at']}}" readonly>
</div>
@endif
@csrf
</form>
</div>
@endsection