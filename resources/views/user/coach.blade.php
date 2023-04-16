<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ISPORT - Music</title>
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" href="{{URL::asset('images/icon.png')}}" type="image/png">
</head>

<body style="background-color: #efefef;">

  @include('comp.userNav')
  @include('comp.sidbar')
  @if (Auth::user()->gender == '' || Auth::user()->quizstatus == '0' )
  <script>
    window.location = "/dashboard";
  </script>

  @endif

  {{-- session is tru --}}
  @if (session('alredy'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'this time is alredy booked',
    })
  </script>

  @endif
  @if (session('past'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'you can not book a session in the past',
    })
  </script>

  @endif
  {{-- session is tru --}}
  @if (session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    Swal.fire({
      icon: 'success',
      title: 'Good job!',
      text: 'you have booked a session',
    })
  </script>
  @endif

  {{-- sweetalert --}}
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

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="p-4 mb-3" style="background: white;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="/images/{{$data->image}}" class="card-img" alt="">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title mb-4 mt-3">{{$data->name}}</h5>
                <p class="card-text">{{$data->description}}</p>
                <p class="card-text"><small class="text-muted"></small>{{$data->price}} DH / PAR 1H</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="p-3" style="background: white;">
      <form method="POST" action="{{route('booking')}}">
        @csrf

        <div class="form-group">
          <input type="hidden" name="coach_id" id="name" class="form-control" value="{{$data->id}}" required>

        </div>
        <div class="form-group">
          <input type="hidden" name="sport" id="name" class="form-control" value="{{$data->sport}}" required>

        </div>

        <div class="form-group">
          <label for="date">Date</label>
          <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
            value="{{ old('date') }}" required>
          @error('date')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="time">Time</label>
          <input type="time" name="time" id="time" class="form-control @error('time') is-invalid @enderror"
            value="{{ old('time') }}" required>
          @error('time')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group  mt-3">
          <button type="submit" class="btn btn-success w-100">Book Now</button>
        </div>
      </form>
    </div>
    {{-- h1 in green top coaches --}}
    {{-- --}}
    <div class="w-100 bg-white mt-4">
     
    </div>
    <div class="mt-4">
      <div class="row row-cols-1 row-cols-md-3 g-4">

      </div>
    </div>
  </div>
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
  <div>
    {{-- feedbacks --}}
    <style>
      .feedback-btn {
        position: absolute;
        position-attachment: fixed;
        width: 45px;
        height: 100px;
        background: #025261;
        top: 45%;
        right: 0;
        border-left: 2px solid #fff;
        border-top: 2px solid #fff;
        border-bottom: 2px solid #fff;
        box-shadow: 1px 1px 3px #000;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        cursor: pointer;
        transition: 0.2s ease-out;
      }

      .feedback-btn:hover {
        width: 50px;
      }

      .feedback-txt {
        transform: rotate(-90deg);
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        position: absolute;
        right: -10px;
        top: 22px;
        color: #fff;
        transition: 0.2s ease-out;
      }

      .feedback-btn:hover .feedback-txt {
        right: -6px;
      }
    </style>
    <a target="_blank" href="https://api.whatsapp.com/send?phone={{$coachuser->phone}}">
      <div class="feedback-btn">
        <p class="feedback-txt mt-3">CONTACT </p>
      </div>
  </div>
  </a>

  {{-- sweet alert html costumize --}}

  <!-- /#wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    < /> <
    /body> <
    /html>