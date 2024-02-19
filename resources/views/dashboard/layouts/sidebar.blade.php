<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">CRUD</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                        <i data-feather="home" class="iconify text-black" data-inline="false"></i>
                        <span class="text-black">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/students">
                        <i data-feather="user" class="iconify text-black" data-inline="false"></i>
                        <span class="text-black">Student</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/kelas">
                        <i data-feather="list" class="iconify text-black" data-inline="false"></i>
                        <span class="text-black"> Class</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column mb-auto">

            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <form action="/login/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center gap-2"
                            style="border: none; background-color: transparent;">
                            <i data-feather="power" class="iconify text-danger" data-inline="false"></i>
                            <span class="text-danger">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</div>
