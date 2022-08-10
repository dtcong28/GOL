<ul class="pt-5 line_height">



    <li class="pt-3">
        <span>@lang('Language')</span>
        <ul>
            <li><a href="{{ route('lang',['lang' => 'vi']) }}">VI</a>--<a href="{{ route('lang',['lang' => 'en' ]) }}">EN</a></li>
        </ul>
    </li>
    <li class="pt-3">
        <span>@lang('System')</span>
        <ul>
            <li><a href="{{ route('user.index') }}">@lang('User management')</a></li>
            <li><a href="{{ route('role.index') }}">@lang('Role management')</a></li>
            <li><a href="{{ route('permission.index') }}">@lang('Permission management')</a></li>
            <li><a href="{{ route('permission-group.index') }}">@lang('Permission group management')</a></li>
        </ul>
    </li>
    <li class="pt-3">
        <span>@lang('Catalog')</span>
        <ul>
            <li><a href="{{ url('admin/product') }}">@lang('Product management')</a></li>
            <li><a href="{{ url('admin/category') }}">@lang('Category management')</a></li>
        </ul>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            <button>@lang('Logout')</button>
            @csrf
        </form>
    </li>
</ul>