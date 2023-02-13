<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home</title>
    <!-- ================== BEGIN core-css ================== -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading ms-2 py-4 text-black fs-4 fw-bold text-uppercase border-bottom"><i
                    class=""></i>Bistro <span style="color: hsl(33, 75%, 62%)">Maroc</span>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-transparent active"><i
                        class="fas fa-tachometer-alt me-2"></i>Home</a>
                        <a href="{{ route('profile.user') }}" class="list-group-item list-group-item-action bg-transparent second-text text-black fw-bold"><i
                        class="fa fa-user me-2 text-black"></i> Profile</a>
                    <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-danger"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off me-2 text-danger"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg bg-transparent py-4 px-4 d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fas fa-bars primary-text fs-4 me-3" style="color: black; cursor: pointer;"
                        id="controlPanel" onclick="wrapside()"></i>
                    <h2 class="fs-2 m-0 text-black">Home</h2>
                </div>
                <div class="d-flex">
                <div class="">
                <p class="" style="margin-top: 0.3rem;">Today's Date</p>
                <?php echo '<h4 class="fw-bold" style="margin-top: -1rem;">'.date("Y-m-d").'</h4>'?>
                 </div>
                 <div><img class="rounded p-2 border border-secondary ms-2" src="{{asset('/img/calendar.svg')}}" alt=""></div>
               </div>
            </nav>
            <!-- Welcome user Message -->
            <div class="container-fluid px-4">
                <div class="row my-2">
                    <h3 class="fs-4 text-black">Today's Menu</h3>
                </div>
                <div class="row">
                @foreach ($items as $item)
                        <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('show',$item->id) }}" class="text-decoration-none">
                            <div class="card" >
                                <img class="card-img-top" src="/img/{{$item->image }}" width="150px" height="160px" alt="">
                                <div class="card-body">
                                  <p class="card-text fw-bold text-black">Title: <span style="color: hsl(33, 75%, 62%)">{{$item->name }}</span></p>
                                  <p class="card-text text-black fw-bold">Price: <span style="color: hsl(144, 96%, 34%)">{{$item->price }} DH</span></p>
                                  <p class="card-text text-black fw-bold">Category: <span style="color: hsl(344, 85%, 44%)">{{$item->category }}</span></p>
                                </div>
                              </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
</body>
<!-- ================== BEGIN core-js ================== -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<!-- ================== END core-js ================== -->
</html>