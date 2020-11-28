<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HTC-Library</title>
    <link href="{{asset('dist/css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
@include('includes.nav')
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
       @include('includes.menu')
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"></h1>


{{--                <div class="row">--}}
{{--                    <div class="col-xl-6">--}}
{{--                        <div class="card mb-4">--}}
{{--                            <div class="card-header">--}}
{{--                                <i class="fas fa-chart-area mr-1"></i>--}}
{{--                                Area Chart Example--}}
{{--                            </div>--}}
{{--                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-6">--}}
{{--                        <div class="card mb-4">--}}
{{--                            <div class="card-header">--}}
{{--                                <i class="fas fa-chart-bar mr-1"></i>--}}
{{--                                Bar Chart Example--}}
{{--                            </div>--}}
{{--                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @include('sweetalert::alert')
                @yield('content')
            </div>
        </main>
@include('includes.footer')
    </div>
</div>
@include('includes.scripts')
</body>
</html>
