<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Ticket</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (empty(Auth::user()))
                <a href="/login" class="btn btn-light ms-auto" type="button">Login</a>
            @else
                <form action="{{ url('logout') }}" method="POST" class="ms-auto">
                    @csrf
                    <button class="btn btn-light" type="submit">Logout</button>
                </form>
            @endif
        </div>
    </div>
</nav>
