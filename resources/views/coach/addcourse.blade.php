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
        <div class="mt-4">
          {{-- for of adding a course --}}
          <div class="formcontainer">
            <form action="{{route('storecourse')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <!-- Name input -->
              <div class="form-outline mb-1">
                <label class="form-label" for="form4Example1">Name</label>
                <input type="text" name="name" id="form4Example1" class="form-control" placeholder="Name Example" />
              </div>
              {{-- image input --}}
              <div class="form-outline mb-1">
                <label class="form-label" for="form4Example2">Image</label>
                <input type="file" name="image" class="form-control">

              </div>

              <!-- Email input -->
              <div class="form-outline mb-1">
                <label class="form-label" for="form4Example2">Link</label>
                <input type="text" name="link" id="form4Example2" class="form-control"
                  placeholder="www.example.com/course" />
              </div>
              <div class="form-outline mb-1">
                <label class="form-label" for="form4Example2">Level</label>
                <input type="text" name="level" id="form4Example2" class="form-control" placeholder="Hard / Easy" />
              </div>

              <!-- Message input -->
              <div class="form-outline mb-1">
                <label class="form-label" for="form4Example3">Description</label>
                <textarea name="description" class="form-control"
                  placeholder="Description example ,you can add up to 500 word here" id="form4Example3"
                  rows="12"></textarea>
              </div>

              <!-- Submit button -->
              <div class="mt-3 ">
                <button type="submit" class="btn btn-outline-success btn-sm mb-4 w-100">Send</button>
              </div>
            </form>
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