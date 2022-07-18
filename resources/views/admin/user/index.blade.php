@extends('main')
@section('content')

    <div class="container pt-5">
        <div>
            <div class="row">
                <h6 class="col-4">User List</h6>
                <div class="col-6"></div>
                <button class="btn btn-primary col-1" style="width: 120px"><a href="/admin/user/create"
                                                                              style="color: white">+ Add new</a>
                </button>
            </div>

            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th class="text-center" scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
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
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
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
