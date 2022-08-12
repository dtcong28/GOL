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

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th class="text-center" scope="col">{{ __('label.Avatar')}}</th>
                    <th scope="col">{{ __('label.Name')}}</th>
                    <th scope="col">Email</th>
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
                        <button type="button" class="btn btn-primary btn-sm">{{ __('button.Edit')}}</button>
                        <button type="button" class="btn btn-danger btn-sm">{{ __('button.Delete')}}</button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
        <div>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>

                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
@endsection