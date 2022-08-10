@extends('main')
@section('content')

    <div class="container pt-5">
        <div>
            <div class="row">
                <h6 class="col-4">{{ __('admin.Product List')}}</h6>
            </div>

            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th scope="col">{{ __('admin.Name')}}</th>
                    <th scope="col">{{ __('admin.Amount')}}</th>
                    <th scope="col">{{ __('admin.Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @for($i =0; $i<5; $i++)
                    <tr>
                        <td>Product test</td>
                        <td>5</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">{{ __('admin.Edit')}}</button>
                            <button type="button" class="btn btn-danger btn-sm">{{ __('admin.Delete')}}</button>
                            <button type="button" class="btn btn-success btn-sm">{{ __('admin.Show')}}</button>
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
