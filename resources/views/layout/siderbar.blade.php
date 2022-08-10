<ul class="pt-5 line_height">



    <li class="pt-3">
        <span>{{ __('admin.Language') }}</span>
        <ul>
            <li><a href="{{ route('lang',['lang' => 'vi']) }}">VI</a>--<a href="{{ route('lang',['lang' => 'en' ]) }}">EN</a></li>
        </ul>
    </li>
    <li class="pt-3">
        <span>{{ __('admin.System')}}</span>
        <ul>
            <li><a href="{{ route('user.index') }}">{{ __('admin.User management')}}</a></li>
            <li><a href="{{ route('role.index') }}">{{ __('admin.Role management')}}</a></li>
            <li><a href="{{ route('permission.index') }}">{{ __('admin.Permission management')}}</a></li>
            <li><a href="{{ route('permission-group.index') }}">{{ __('admin.Permission group management')}}</a></li>
        </ul>
    </li>
    <li class="pt-3">
        <span>{{ __('admin.Catalog')}}</span>
        <ul>
            <li><a href="{{ url('admin/product') }}">{{ __('admin.Product management')}}</a></li>
            <li><a href="{{ url('admin/category') }}">{{ __('admin.Category management')}}</a></li>
        </ul>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            <button>{{ __('admin.Logout')}}</button>
            @csrf
        </form>
    </li>
</ul>