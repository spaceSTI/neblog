<h2>Dashboard</h2>

<ul>
    <li><a href="{{ route('admin-article-form') }}">Add article</a></li>
</ul>

<ul>
    <li><a href="{{ route('admin-article-list') }}">Article list</a></li>
</ul>
<ul>
    <li><a class="btn btn-dark" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
