<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
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
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-transparent active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action bg-transparent second-text text-black fw-bold"><i
                        class="fa fa-user me-2 text-black"></i> Profile</a>
                <a href="{{ route('create') }}" class="list-group-item list-group-item-action bg-transparent second-text text-black fw-bold"
                    onclick="resetItemsForm()"><i class="fa fa-plus me-2 text-black"></i>Add Item</a>
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
                    <h2 class="fs-2 m-0 text-black">Dashboard</h2>
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
                <div class="row g-3 my-2">
                    <div class="col-lg-2 col-md-4 col-sm-5">
                        <div class="p-2 bg-white d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{ $itemCount }}</h3>
                                <p class="fs-5 text-black">Items</p>
                            </div>
                            <i class="fa fa-cutlery fs-1 text-info border rounded-full p-3 ms-1" style="background-color: white;"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5">
                        <div class="p-2 bg-white d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{ $userCount }}</h3>
                            <p class="fs-5 text-black">Users</p>
                            </div>
                            <i class="fas fa-users fs-1 text-info border rounded-full p-3 ms-1" style="background-color: white;"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5">
                        <div class="p-2 bg-white d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{ $foodCount }}</h3>
                            <p class="fs-5 text-black">Foods</p>
                            </div>
                            <i class="fa fa-burger fs-1 text-info border rounded-full p-3 ms-1" style="background-color: white;"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5">
                        <div class="p-2 bg-white d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{ $drinkCount }}</h3>
                            <p class="fs-5 text-black">Drinks</p>
                            </div>
                            <i class="fa fa-cocktail fs-1 text-info border rounded-full p-3 ms-1" style="background-color: white;"></i>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <h3 class="fs-4 text-black">Available Items</h3>
                </div>
                    <div class="col table-responsive mb-2">
                        <table id="data-table" class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-blue">#Id</th>
                                    <th scope="col" class="text-blue">Image</th>
                                    <th scope="col" class="text-blue">Name</th>
                                    <th scope="col" class="text-blue">Price</th>
                                    <th scope="col" class="text-blue">Category</th>
                                    <th width="100px" class="text-blue">Action</th>
                                </tr>
                            </thead>
                            <tbody id="">
            @foreach ($items as $item)
            <tr>
            <td class="fw-bolder">{{ ++$i }}</td>
            <td><img src="/img/{{ $item->image }}" width="85px"></td>
            <td class="fw-bolder" style="color: hsl(14, 88%, 50%)">{{ $item->name }}</td>
            <td class="fw-bolder" style="color: hsl(112, 74%, 36%)">{{ $item->price }} DH</td>
            <td class="fw-bolder" style="color: hsl(47, 87%, 53%)">{{ $item->category }}</td>
            <td>
                <a href="{{ route('edit', $item->id) }}" class="btn btn-success opacity-75" style="width: 55px;">Edit</a>
                <a href="{{ route('destroy',$item->id) }}" type="submit" class="btn btn-danger" style="width: 55px;">Delete</a>
            </td>
        </tr>
        @endforeach
                            </tbody>
                        </table>
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