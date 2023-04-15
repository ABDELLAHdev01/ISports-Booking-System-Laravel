<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ISPORT - Admin</title>
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" href="{{URL::asset('images/2304226.png')}}" type="image/png">
</head>

<body style="background-color: #efefef;">
  {{-- if session success --}}
  @if (session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire({
      icon: 'success',
      title: 'Good job!',
      text: 'you have accepted the coach',
    })
  </script>
  @endif
  @if (session('delete'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire({
      icon: 'success',
      title: 'Good job!',
      text: 'you have deleted the coach',
    })
  </script>

  @endif
  @include('comp.adminnav')
  @include('comp.adminSide')
  <div id="page-content-wrapper">
    <div class="container mt-5  ">
      <div class="row">
        <div class="col-lg-12">
          <a href="#menu-toggle" class=" text-success " id="menu-toggle"><svg class="mt-2 mb-2"
              xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-toggles"
              viewBox="0 0 16 16">
              <path
                d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7h-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm2.45 0A3.49 3.49 0 0 1 8 3.5 3.49 3.49 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5H6.95zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7z" />
            </svg></i></a>

          {{-- <h1>Welcome to Your Coaching Dashboard</h1>
                    
                    <p>From here, you can manage your coaching schedule, review your progress, and book new coaching sessions or online courses. Use the menu on the left to access different parts of your dashboard, or click on the quick links to jump to specific actions. We hope you find our platform helpful in achieving your sports goals, and we look forward to seeing your progress!</p> --}}
        </div>

      </div>
      <!-- /#page-content-wrapper -->
      <div class="row mb-4">
        <div class="mt-2">
          <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
              aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-success">search</button>
          </div>

        </div>
        {{-- h1 
        {{-- h1 in green top coaches --}}
        {{-- --}}
        <div class="mt-4">
          <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Name</th>
                <th>Sport</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="{{URL::asset('images')}}{{'/'.$item->image}}" alt="" style="width: 45px; height: 45px"
                      class="rounded-circle" />
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$item->name}}</p>
                      <p class="text-muted mb-0">{{$item->location}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">{{$item->sport}}</p>
                  <p class="text-muted mb-0">{{$item->yearsofexperience}} Years</p>
                </td>
                <td>
                  {{-- <button class="btn btn-sm btn-outline-success"><i class="bi bi-eye-fill"></i> Read</button> --}}
                  <!-- Button trigger modal -->
                  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"
                    class="btn btn-sm btn-outline-success">
                    <i class="bi bi-eye-fill"></i> Read
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-clipboard-fill"></i>
                            Description</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          @csrf
                          <label for="sport">

                            <h5 class="text-success">Description :</h5>
                            <p class="text-muted">{{$item->description}} </p>
                          </label>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>

                <td>

                  <a href="{{route('deletecoach',$item->user_id)}}" class="btn btn-sm btn-sm btn-danger"><i
                      class="bi bi-trash3-fill"></i> DELETE</a>

                </td>
              </tr>
              @endforeach

            </tbody>

          </table>
          <style>
            .pagination {
              background: white;

            }
          </style>
          {{ $data->links() }}

          {{-- <div class="col">
              <div class="card h-100">
                <img src="https://cdn.becomeopedia.com/wp-content/uploads/Sports-Coach.jpg" class="card-img-top" alt="Los Angeles Skyscrapers"/>
                <div class="card-body">
                  <h5 class="card-title">Nadia DARIM</h5>
                  <p class="card-text">I am a female coach with 4 years of experience , i love Baskete-ball <3 </p>
                </div>
                <div class="card-footer">
                  <small class="text-muted"><i class="bi bi-check-all"></i> Online</small>
                </div>
              </div>
            </div> --}}
          {{-- <div class="col">
              <div class="card h-100">
                <img src="https://media.stack.com/stack-content/uploads/2020/02/11185812/Coach-Communication.jpg" class="card-img-top" alt="Palm Springs Road"/>
                <div class="card-body">
                  <h5 class="card-title">Ahmad Yassin CHAFII</h5>
                  <p class="card-text">
                I am a Foot-ball player & coach , i have 5 years of experience in the field of coaching. 
                  </p>
                </div> --}}

        </div>
      </div>
    </div>

  </div>

  </div>
  {{-- top top courses --}}

  <!-- /#wrapper -->
  @include('comp.jq')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>