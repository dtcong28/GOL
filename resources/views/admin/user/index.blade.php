@extends('main')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('user.User List')}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="container pt-1">
    <div>
        <div class="row">
            <button class="btn btn-primary btn-sm" style="width: 100px; margin-right:10px"><a href="/admin/FormSendEmail" style="color: white">{{ __('button.Send mail')}}</a>
            </button>
            <button class="btn btn-primary btn-sm" style="width: 120px"><a href="/admin/user/create" style="color: white">+ {{ __('button.Add new')}}</a>
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
                    <th class="text-center" scope="col">{{ __('label.Avatar')}}</th>
                    <th scope="col">{{ __('label.Name')}}</th>
                    <th scope="col">Email</th>
                    <th scope="col">{{ __('label.Role')}}</th>
                    <th scope="col">{{ __('label.Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($users))
                @foreach ($users as $user)
                <tr>
                    <td class="text-center"><img src="/template/images/avt.png" alt="IMG-LOGO" style="width: 50px;">
                    </td>

                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                        - {{$role->name}}
                        <br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">{{ __('button.Edit')}}</a>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-success btn-sm">{{ __('button.Show')}}</a>
                        <form class="d-inline" method="post" action="{{ route('user.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return Del('<?= $user->name ?>')" class="btn btn-danger btn-sm"> {{ __('button.Delete')}} </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        @if(!empty($users))
        {{ $users->links() }}
        @endif
    </div>
</div>
@endsection