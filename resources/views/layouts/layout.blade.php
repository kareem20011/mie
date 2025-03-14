<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Tooplate">

    <title>Mini Finance Dashboard Template</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/apexcharts.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/tooplate-mini-finance.css') }}" rel="stylesheet">


</head>

<body>
    <header class="navbar sticky-top flex-md-nowrap">
        <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
            <a class="navbar-brand" href="index.html">
                <i class="bi-box"></i>
                Mini Finance
            </a>
        </div>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="navbar-nav me-lg-2">
            <div class="nav-item text-nowrap d-flex align-items-center">


                <div class="dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset( 'assets/images/medium-shot-happy-man-smiling.jpg' ) }}" class="profile-image img-fluid" alt="">
                    </a>
                    <ul class="dropdown-menu bg-white shadow">
                        <li>
                            <div class="dropdown-menu-profile-thumb d-flex">
                                <img src="{{ asset( 'assets/images/medium-shot-happy-man-smiling.jpg' ) }}" class="profile-image img-fluid me-3" alt="">

                                <div class="d-flex flex-column">
                                    <small>Thomas</small>
                                    <a href="#">thomas@site.com</a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a class="dropdown-item" href="setting.html">
                                <i class="bi-gear me-2"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="help-center.html">
                                <i class="bi-question-circle me-2"></i>
                                Help
                            </a>
                        </li>

                        @if(auth()->user())
                        <li>
                            <a class="dropdown-item" href="{{ route( 'profile.edit' ) }}">
                                <i class="bi-person me-2"></i>
                                Profile
                            </a>
                        </li>

                        <li class="border-top mt-3 pt-2 mx-4">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <i class="bi-box-arrow-left me-2"></i>
                                <button class="dropdown-item ms-0 me-0">Logout</button>
                            </form>
                        </li>
                        @else
                        <li>
                            <a class="dropdown-item" href="{{ route( 'login' ) }}">
                                <i class="bi-person me-2"></i>
                                Login
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            <!-- Side bar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                                <i class="bi-house-fill me-2"></i>
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('products.*') ? 'active' : '' }}" aria-current="page" href="{{ route('products.index') }}">
                                <i class="bi-house-fill me-2"></i>
                                Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('users.*') ? 'active' : '' }}" aria-current="page" href="{{ route('users.index') }}">
                                <i class="bi-house-fill me-2"></i>
                                users
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('categories.*') ? 'active' : '' }}" aria-current="page" href="{{ route('categories.index') }}">
                                <i class="bi-house-fill me-2"></i>
                                categories
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('colors.*') ? 'active' : '' }}" aria-current="page" href="{{ route('colors.index') }}">
                                <i class="bi-house-fill me-2"></i>
                                colors
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                                <i class="bi-house-fill me-2"></i>
                                dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <!-- CONTENTS -->

                @yield('contents')

            </main>

        </div>
    </div>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script type="text/javascript">
        var options = {
            series: [13, 43, 22],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Balance', 'Expense', 'Credit Loan', ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
        chart.render();
    </script>

    <script type="text/javascript">
        var options = {
            series: [{
                name: 'Income',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Expense',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Transfer',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</body>

</html>