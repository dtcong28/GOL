<ul class="pt-5 line_height">
    <li class="pt-3">
        <span>System</span>
        <ul>
            <li><a href="{{ url('admin/user') }}">User management</a></li>
            <li><a href="{{ url('admin/role') }}">Role management</a></li>
            <li><a href="{{ url('admin/permission') }}">Permission management</a></li>
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
