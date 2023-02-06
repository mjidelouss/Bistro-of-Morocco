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
                <a href="" class="list-group-item list-group-item-action bg-transparent active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="" class="list-group-item list-group-item-action bg-transparent second-text text-black fw-bold"><i
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
                                <h3 class="fs-2">{{ $itemCount }}</h3>
                            <p class="fs-5 text-black">Authors</p>
                            </div>
                            <i class="fa fa-people-group fs-1 text-info border rounded-full p-3 ms-1" style="background-color: white;"></i>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <h3 class="fs-4 text-black">Available Items</h3>
                </div>
                <div class="mb-3">
                <form action="" method="POST">
                <div class="input-group d-flex">
                    <div class="form-outline">
                        <select class="form-control" id="filter" name="filter" style="width: 12rem;">
                            <option value="0">All Categories</option>
                            @php
                                $c = 1;
                            @endphp
                            @foreach ($categories as $category)
                                @if(request()->post("filter") == {{ $c }})
                                    <option value="{{$c}}" selected>{{ $category->category }}</option>
                                @else
                                    <option value="{{$c}}">{{ $category->category }}</option>
                                @endif
                            @php
                                $c++;
                            @endphp
                            @endforeach
                            </select>
                    </div>
                    <button type="submit" name="search" class="btn btn-primary rounded ms-2">
                        <i class="fas fa-search"></i>
                    </button>
                  </form>
                </div>
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
            <td><img src="/img/{{ $item->image }}" width="80px"></td>
            <td class="fw-bolder">{{ $item->name }}</td>
            <td class="fw-bolder">{{ $item->price }}</td>
            <td class="fw-bolder">{{ $item->category }}</td>
            <td>
                <form action="" method="POST">
                    <a class="btn btn-success opacity-75" href="">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <!-- UPDATE & DELETE BOOK MODAL -->
    <div class="modal fade" id="modal-updateArt">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header d-flex justify-content-center" style="
              border: none;
            ">
                    </div>
                    <div class="modal-body">
                        <div class="" id="">
                            <input type="text" id="articleId" name="articleId" style="display: none">
                            <label class="col-form-label text-black">Title</label>
                            <input type="text" class="form-control mb-2" id="newTitle" name="newTitle" />
                        </div>
                        <div class="" id="">
                            <label class="col-form-label text-black">Author</label>
                            <input type="text" class="form-control mb-2" id="newAuthor" name="newAuthor" />
                        </div>
                        <div class="">
                            <label class="col-form-label text-black">Category</label>
                            <select class="form-control mb-2" id="newCategory" name="newCategory">
                                <option disabled selected>Please select</option>
                                <option value="FrontEnd">FrontEnd</option>
                                <option value="BackEnd">BackEnd</option>
                                <option value="Network">Network</option>
                                <option value="Cloud">Cloud</option>
                                <option value="DevOps">DevOps</option>
                                <option value="Big Data">Big Data</option>
                                <option value="UI & UX">UI & UX</option>
                                <option value="Web">Web</option>
                                <option value="Cyber Security">Cyber Security</option>
                            </select>
                        </div>
                        <div class="">
                            <textarea class="form-control" id="newContent" name="newContent"></textarea>
                            <script>
                                CKEDITOR.replace( 'newContent' );
                            </script>
                        </div>
                        </div>
                            <div class="modal-footer" style="border: none">
                            <button type="button" class="btn btn-primary border rounded-pill" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="update" name="update" class="btn btn-success rounded-pill text-white">Update</button>
                    </form>
                </div>
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