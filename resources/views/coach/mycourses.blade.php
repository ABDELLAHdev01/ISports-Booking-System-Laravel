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
  {{-- if session mycourses true --}}
  @if(session('addedd'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire(
      'Good job!',
      'Your course has been added successfully !',
      'success'
    )
  </script>

  @endif
  {{-- if session deleted true --}}
  @if(session('deleted'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire(
      'Good job!',
      'Your course has been deleted successfully !',
      'success'
    )
  </script>

  @endif
  {{-- if session updated --}}
  @if(session('updated'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire(
      'Good job!',
      'Your course has been updated successfully !',
      'success'
    )
  </script>

  @endif
  {{-- if session updated --}}

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
          <div>
            {{-- button in the right side --}}
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex justify-content-end">
                  <a href="{{route('addcourse')}}" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i>
                    Add Course</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /#page-content-wrapper -->
        <div class="row mb-4">
          {{-- add course btn in the left side --}}

        </div>

        <div class="col-lg-12">
          <h1 class="text-center">Courses</h1>
        </div>

        <div class="row">
          {{-- if couses less then 0  --}}

          <div class="mt-4">
            <table class="table align-middle mb-0 bg-white">
              <thead class="bg-light">
                <tr>

                  <th>Image</th>
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)

                <tr>
                  <td>
                    <img src="{{asset('images/'.$item->image)}}" alt="" width="100px" height="100px">
                  </td>
                  <td>
                    <div class="d-flex align-items-center">

                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{$item->name}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex">
                      {{-- edit btn --}}
                      <form action="{{route('editcourse')}}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn btn-outline-success btn-sm me-2"><i
                            class="bi bi-pencil-square"></i> Edit</button>
                      </form>
                      <div>
                        {{-- delete btn --}}
                        <form action="{{route('deletecourse',$item->id)}}" method="get">
                          @csrf
                          @method('get')
                          <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i>
                            Delete</button>
                        </form>
                      </div>
                    </div>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>

        </div>
        {{-- table showin course image and name and actions --}}

        {{-- top top courses --}}

        <!-- /#wrapper -->
        @include('comp.jq')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

</body>

</html>