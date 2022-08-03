<ul class="pt-5 line_height">
    <li class="pt-3">
        <span>System</span>
        <ul>
            <li><a href="{{ route('user.index') }}">User management</a></li>
            <li><a href="{{ route('role.index') }}">Role management</a></li>
            <li><a href="{{ route('permission.index') }}">Permission management</a></li>
            <li><a href="{{ route('permission-group.index') }}">Permission group</a></li>
        </ul>
    </li>
    <li class="pt-3">
        <span>Catalog</span>
        <ul>
            <li><a href="{{ url('admin/product') }}">Product management</a></li>
            <li><a href="{{ url('admin/category') }}">Category management</a></li>
        </ul>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            <button>Logout</button>
            @csrf
        </form>
    </li>
</ul>
