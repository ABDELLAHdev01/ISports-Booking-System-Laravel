<nav class="navbar navbar-expand-lg bg-body-tertiar border-bottom-0 position-fixed top-0 w-100"
  style="background-color: #243441; z-index:9999;">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="{{route("home")}}"><i class="bi bi-briefcase-fill text-success"> <span
          class="text-white"> ADMIN DASHBOARD </span></i> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        {{-- <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#home">Home</a>
              </li> --}}

        <!--  -->
        <!-- <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li> -->
      </ul>

      <div>

        {{-- 9ont dial nav --}}

      </div>
      <form method="POST" action="{{Route("logout")}}">
        @csrf
        {{-- <a type="button" class="btn btn-success nav-item btn-sm " href="{{url("dashboard")}}">DASHBOARD</a> --}}
        <button type="submit" class="btn btn-outline-success btn-sm nav-item ">LOGOUT</button>
      </form>

    </div>
  </div>
</nav>