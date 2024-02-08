<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Requiem</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Analytics</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Inventory</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Products
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/products/') }}">See All</a></li>
                <li><a class="dropdown-item" href="{{ url('/products/create') }}">Create New</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Product Categories
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/category/') }}">See All</a></li>
                <li><a class="dropdown-item" href="{{ url('/category/create') }}">Create New</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Branches and Employees
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/branch/') }}">Manage Branches</a></li>
                <li><a class="dropdown-item" href="{{ url('/employees/') }}">Manage Employees</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <script>
        $(document).ready( function() {
        $('.dropdown-toggle').dropdown();
        });
    </script>