<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ISPORT - Coaches</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{URL::asset('images/icon.png')}}" type="image/png">
</head>

<body style="background-color: #efefef;">

    @include('comp.coachnav')
    @include('comp.coachsidbar')

    <div id="page-content-wrapper">
        <div class="container mt-5  ">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#menu-toggle" class=" text-success " id="menu-toggle"><svg class="mt-2 mb-2"
                            xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-toggles" viewBox="0 0 16 16">
                            <path
                                d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7h-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm2.45 0A3.49 3.49 0 0 1 8 3.5 3.49 3.49 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5H6.95zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7z" />
                        </svg></i></a>

                    {{-- <h1>Welcome to Your Coaching Dashboard</h1>
                
                <p>From here, you can manage your coaching schedule, review your progress, and book new coaching sessions or online courses. Use the menu on the left to access different parts of your dashboard, or click on the quick links to jump to specific actions. We hope you find our platform helpful in achieving your sports goals, and we look forward to seeing your progress!</p> --}}
                </div>

            </div>
            <!-- /#page-content-wrapper -->
            <div class="row mb-4">

                {{-- <div class="mt-2">
      <form action="{{route('searchcoach')}}" method="get">
                <div class="input-group">

                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-success">search</button>
                    </form>
                </div> --}}
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span><i
                                                    class="bi bi-hourglass-split"></i> Pending </span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>{{count($pending)}}</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span><i
                                                    class="bi bi-calendar-check-fill"></i> Accepted</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>{{count($accepted)}}</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-danger fw-bold text-xs mb-1"><span><i
                                                    class="bi bi-x-circle-fill"></i> Rejected</span></div>
                                        <div class="row g-0 align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark fw-bold h5 mb-0"><span>{{count($rejected)}}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span><i
                                                    class="bi bi-bookmark-fill"></i> All Books</span></div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>{{count($bookings)}}</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending as $item)

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{$item->name}}</p>
                                            <p class="text-muted mb-0">{{$item->phone}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->time}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('accept',$item->id)}}" class="btn btn-success btn-sm me-2"><i
                                                class="bi bi-calendar-check-fill"></i> Accept</a>
                                        <a href="{{route('reject',$item->id)}}" class="btn btn-danger btn-sm"><i
                                                class="bi bi-x-circle-fill"></i> Reject</a>
                                    </div>
                            </tr>
                            @endforeach

                </div>

            </div>
            {{-- top top courses --}}

            <!-- /#wrapper -->
            @include('comp.jq')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
                crossorigin="anonymous"></script>

</body>

</html>