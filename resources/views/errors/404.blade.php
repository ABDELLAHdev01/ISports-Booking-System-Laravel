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

    {{-- 404 page --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <img src="{{URL::asset('images/—Pngtree—page not found or error_6501261.png')}}" alt="" class=""
                        style="width: 30%">
                    <h3></h3>
                    <a href="/" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left-circle-fill"></i> Go Back</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /#page-content-wrapper -->
    <div class="row mb-4">

    </div>
    {{-- top top courses --}}

    <!-- /#wrapper -->
    @include('comp.jq')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>