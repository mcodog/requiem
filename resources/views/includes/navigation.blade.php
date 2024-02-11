<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#1c0f4d;">
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
            <a class="nav-link disabled" aria-current="page" href="{{ url('/') }}">Analytics</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" aria-current="page" href="{{ url('/') }}">Inventory</a>
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
            <?php
                $user = Auth::user();
                $current_user = $user->name;

                echo "<div class='dropdown'>
                <button class='btn border-0 btn-outline-light dropdown-toggle d-flex justify-content-center align-items-center ' type='button' id='dropdownMenuButton' data-toggle='dropdown' data-bs-auto-close='outside' aria-haspopup='true' aria-expanded='false'>
                <div class='container p-2' style='height:50px;width:50px;'>
						<img src=" . URL::asset('icon/user.png') . " style='object-fit:contain;overflow:hidden;height:100%;width:100%;' alt='logo'>
					</div>
                  
                </button>
                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
                
                  <h6 class='dropdown-header'>" . $current_user ."</h6>
                  <a class='dropdown-item disabled' href='#')'>Account Settings</a>
                  <a class='dropdown-item' href='/logout')'>Log Out</a>
                </div>
              </div>";
            ?>
        </form>
    </div>
    </nav>

    <script>
        $(document).ready( function() {
        $('.dropdown-toggle').dropdown();
        });
    </script>