<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ISPORT  - Dashboard</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{URL::asset('images/icon.png')}}" type="image/png">
</head>
<body style="background-color: #efefef;">
 
  
@include('comp.userNav')
@include('comp.sidbar')

@if(session('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  Swal.fire(
    'Good job!',
    'Your quiz has been submitted successfully !',
    'success'
  )
</script>

@endif
@if (Auth::user()->quizstatus == '0' )
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  Swal.fire(
    // redirect it to the profile page
  'Hey! {{Auth::user()->name}}',
  'please complete your quiz !',
  'warning'
).then(function() {
    window.location = "/quiz";
});

</script>

@endif
@if (Auth::user()->gender == ''  )
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  Swal.fire(
    // redirect it to the profile page
  'Hey!',
  'please complete your profile !',
  'warning'
).then(function() {
    window.location = "/profile";
}); 
</script>
    
@endif

<div id="page-content-wrapper">
    <div class="container mt-5  ">
        <div class="row">
            <div class="col-lg-12">
                <a href="#menu-toggle" class=" text-success " id="menu-toggle"><svg class="mt-2 mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-toggles" viewBox="0 0 16 16">
                    <path d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7h-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm2.45 0A3.49 3.49 0 0 1 8 3.5 3.49 3.49 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5H6.95zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7z"/>
                  </svg></i></a>
                  <div class="card mb-3 mt-3">
                    <img src="https://t3.ftcdn.net/jpg/02/11/59/38/360_F_211593857_XyIV5KDmTpOUZJzL9JsQrygqqrzI3FIR.webp" alt="" srcset="" height="190px">
                  </div>
                <h1>Welcome to Your Coaching Dashboard</h1>
                
                <p>From here, you can manage your coaching schedule, review your progress, and book new coaching sessions or online courses. Use the menu on the left to access different parts of your dashboard, or click on the quick links to jump to specific actions. We hope you find our platform helpful in achieving your sports goals, and we look forward to seeing your progress!</p>
       
              </div>

           
</div>
<!-- /#page-content-wrapper -->
<div class="row mb-4">
    {{-- h1 in green top coaches --}}
    <div class="col-12">
        <h1 class="text-dark">Top Coaches <i class="bi bi-chat-square-heart"></i></i></h1>
        <div class="mt-4">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                  <div class="card h-100">
                    <img src="https://olasjobs.org/resources/wp-content/uploads/2021/01/How-to-Become-a-Professional-High-School-Coach.jpg" class="card-img-top" alt="Skyscrapers"/>
                    <div class="card-body">
                      <h5 class="card-title">Zack EL GHOULAM</h5>
                      <p class="card-text">
                       I am a professional coach with 10 years of experience in the field of basket-ball coaching.
                      </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Online 3 mins ago</small>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="https://cdn.becomeopedia.com/wp-content/uploads/Sports-Coach.jpg" class="card-img-top" alt="Los Angeles Skyscrapers"/>
                    <div class="card-body">
                      <h5 class="card-title">Fatimezzahra DARIM</h5>
                      <p class="card-text">I am a female coach with 4 years of experience , i love Baskete-ball <3 </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><i class="bi bi-check-all"></i> Online</small>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="https://media.stack.com/stack-content/uploads/2020/02/11185812/Coach-Communication.jpg" class="card-img-top" alt="Palm Springs Road"/>
                    <div class="card-body">
                      <h5 class="card-title">Ahmad Yassin CHAFII</h5>
                      <p class="card-text">
                    I am a Foot-ball player & coach , i have 5 years of experience in the field of coaching. 
                      </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Online 1 day ago</small>
                    </div>
                  </div>
                </div>
              </div>
           </div>
       
   

{{--  --}}

{{--  --}}


</div>
</div>

</div>
<div class="row">
{{-- h1 in green top coaches --}}
<div class="col-12">
    <h1 class="text-dark">Top Courses <i class="bi bi-chat-square-heart"></i></h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Hollywood Sign on The Hill"/>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            This is a longer card with supporting text below as a natural lead-in to
            additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road"/>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            This is a longer card with supporting text below as a natural lead-in to
            additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/043.webp" class="card-img-top" alt="Los Angeles Skyscrapers"/>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
    </div>
   

</div>
{{-- top top courses --}}

<!-- /#wrapper -->
@include('comp.jq')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>