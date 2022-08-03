@extends('main')
@section('content')

    <div class="container pt-5">
        <div>
            <div class="row">
                <h6 class="col-4">Permission List</h6>
                <div class="col-6"></div>
                <button class="btn btn-primary col-1" style="width: 120px"><a href="/admin/permission/create"
                                                                              style="color: white">+ Add new</a>
                </button>
            </div>

            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @for($i =0; $i<5; $i++)
                    <tr>
                        <td>test</td>
                        <td>des test</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endfor
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
