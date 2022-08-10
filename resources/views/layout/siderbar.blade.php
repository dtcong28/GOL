<ul class="pt-5 line_height">



    <li class="pt-3">
        <span>{{ __('siderbar.Language') }}</span>
        <ul>
            <li><a href="{{ route('lang',['lang' => 'vi']) }}">VI</a>--<a href="{{ route('lang',['lang' => 'en' ]) }}">EN</a></li>
        </ul>
    </li>
    <li class="pt-3">
        <span>{{ __('siderbar.System')}}</span>
        <ul>
            <li><a href="{{ route('user.index') }}">{{ __('siderbar.User management')}}</a></li>
            <li><a href="{{ route('role.index') }}">{{ __('siderbar.Role management')}}</a></li>
            <li><a href="{{ route('permission.index') }}">{{ __('siderbar.Permission management')}}</a></li>
            <li><a href="{{ route('permission-group.index') }}">{{ __('siderbar.Permission group management')}}</a></li>
        </ul>
    </li>
    <li class="pt-3">
        <span>{{ __('siderbar.Catalog')}}</span>
        <ul>
            <li><a href="{{ url('admin/product') }}">{{ __('siderbar.Product management')}}</a></li>
            <li><a href="{{ url('admin/category') }}">{{ __('siderbar.Category management')}}</a></li>
        </ul>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            <button>{{ __('button.Logout')}}</button>
            @csrf
        </form>
    </li>
</ul>