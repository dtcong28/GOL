<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
    @include('layout.header')
    <div class="row full_height">
        <div class="col-3 siderbar full_height">
            @include('layout.siderbar')
        </div>
        <div class="col-9">
            @yield('content')
        </div>
    </div>
    @include('layout.footer')
</body>
