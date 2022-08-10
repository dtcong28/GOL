@extends('main')
@section('content')

    <div class="container pt-5">
        <div>
            <div class="row">
                <h6 class="col-4">@lang('Category List')</h6>
            </div>

            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Description')</th>
                    <th scope="col">@lang('Action')</th>
                </tr>
                </thead>
                <tbody>
                @for($i =0; $i<5; $i++)
                    <tr>
                        <td>Nhập khẩu</td>
                        <td>Nhập từ nước Nhật</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">@lang('Edit')</button>
                            <button type="button" class="btn btn-danger btn-sm">@lang('Delete')</button>
                            <button type="button" class="btn btn-success btn-sm">@lang('Show')</button>
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
