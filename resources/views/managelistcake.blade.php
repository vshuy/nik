<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>
    <link href="{{ asset('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/dashboard.js') }}"></script>
    <link href="{{ asset('src/dashboard.css') }}" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('home') }}" style="color:green">Bánh
            quê</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                @if (Auth::check())
                    <span style="color: red;">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" style="margin-left: 25px;"> Logout</a>
                @else
                    <a href="{{ route('login') }}"> Login</a>
                @endif
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('uploadcakepage') }}">
                                <span data-feather="home"></span> Upload cake or type of cake
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('uploadslidepage') }}">
                                <span data-feather="home"></span> Upload slide page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="file"></span> Mange posts
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="table-responsive">
                    <h2>Manage cakes</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listcake as $ACake)
                                <tr>
                                    <td>{{ $ACake->id }}</td>
                                    <td>{{ $ACake->namecake }}</td>
                                    <td>{{ $ACake->cost }}</td>
                                    <td><a href="/deleteacake/{{ $ACake->id }}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h2>Manage slides</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Slide Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listslide as $ASlide)
                                <tr>
                                    <td>{{ $ASlide->id }}</td>
                                    <td>{{ $ASlide->title }}</td>
                                    <td><a href="/deleteaslide/{{ $ASlide->id }}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
