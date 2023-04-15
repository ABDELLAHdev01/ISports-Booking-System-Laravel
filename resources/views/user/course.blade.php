<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ISPORT - Courses</title>
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
            <div class="row ">

                <div class="">

                </div>
            </div>
            {{-- h1 in green top coaches --}}
            {{-- --}}
            <div class="">
                {{-- course page using data --}}

                {{-- centering the image --}}
                {{-- make image small as thubmnail --}}

                <center>
                    <div class="col-7">
                        <div class="card">
                            <img src="{{asset('images/'.$data->image)}}" class="card-img-top"
                                alt="Hollywood Sign on The Hill" />
                            <div class="card-body">
                                <h5 class="card-title">{{$data->name}}</h5>
                                <p class="card-text">
                                    {{$data->description}}
                                </p>
                                <hr>
                                <div class="">
                                    <h3 class="mt-3">Course Details</h3>
                                    <p class="mt-3">Course Level: {{$data->level}}</p>
                                    <p class="mt-3">Course Coach: <a href="/dashboard/coach/{{$userid->id}}">
                                            {{$data->author}} </a></p>
                                </div>

                                <div>
                                    <a target="_blank" href="{{$data->link}}" class="btn btn-success btn-sm w-100"><i
                                            class="bi bi-play-circle"></i> WATCH</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                {{-- course image --}}

                {{-- showing comments --}}
                {{-- showing comments --}}

                <style>
                    .detailBox {
                        width: 300px;
                        border: 1px solid #bbb;
                        margin: 30px;
                    }

                    .titleBox {
                        background-color: #fdfdfd;
                        padding: 10px;
                    }

                    .titleBox label {
                        color: #444;
                        margin: 0;
                        display: inline-block;
                    }

                    .commentBox {
                        padding: 10px;
                        border-top: 1px dotted #bbb;
                    }

                    .commentBox .form-group:first-child,
                    .actionBox .form-group:first-child {
                        width: 80%;
                    }

                    .commentBox .form-group:nth-child(2),
                    .actionBox .form-group:nth-child(2) {
                        width: 18%;
                    }

                    .actionBox .form-group * {
                        width: 100%;
                    }

                    .taskDescription {
                        margin-top: 10px 0;
                    }

                    .commentList {
                        padding: 0;
                        list-style: none;
                        max-height: 200px;
                        overflow: auto;
                    }

                    .commentList li {
                        margin: 0;
                        margin-top: 10px;
                    }

                    .commentList li>div {
                        display: table-cell;
                    }

                    .commenterImage {
                        width: 30px;
                        margin-right: 5px;
                        height: 100%;
                        float: left;
                    }

                    .commenterImage img {
                        width: 100%;
                        border-radius: 50%;
                    }

                    .commentText p {
                        margin: 0;
                    }

                    .sub-text {
                        color: #aaa;
                        font-family: verdana;
                        font-size: 11px;
                    }

                    .actionBox {
                        border-top: 1px dotted #bbb;
                        padding: 10px;
                    }
                </style>

                <div class="detailBox w-75 ms-5">
                    <div class="titleBox">
                        <label>Comment Box</label>
                        {{-- <button type="button" class="close" aria-hidden="true">&times;</button> --}}
                    </div>
                    <div class="commentBox">

                        {{-- <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> --}}
                        {{-- </div> --}}
                        <div class="actionBox">
                            <ul class="commentList">
                                {{-- if no comment --}}
                                @if (count($comments) == 0)
                                <li class="mb-2">
                                    BE THE FIRST COMMENT 👇👇
                                </li>
                                @endif
                                {{-- if no comment --}}
                                {{-- if comment --}}
                                @foreach ($comments as $comment)
                                <li>
                                    <div class="commenterImage">
                                        <img src="{{asset('images/'.$comment->image)}}"" />
                    </div>
                    <div class=" commentText">
                                        <p class="">{{$comment->comment}}</p> <span class="date sub-text">on
                                            {{$comment->created_at}}</span>

                                    </div>
                                    @if (Auth::user()->id == $comment->user_id)
                                    <div class="ms-5 ">
                                        <form action="{{route('deletecomment')}}" method="post">
                                            @method('post')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$comment->id}}">
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>
                                                Delete</button>
                                        </form>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                                {{-- <li>
                    <div class="commenterImage">
                      <img src="http://placekitten.com/50/50" />
                    </div>
                    <div class="commentText">
                        <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
    
                    </div>
                </li>
                <li>
                    <div class="commenterImage">
                      <img src="http://placekitten.com/45/45" />
                    </div>
                    <div class="commentText">
                        <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>
    
                    </div>
                </li>
                <li>
                    <div class="commenterImage">
                      <img src="http://placekitten.com/40/40" />
                    </div>
                    <div class="commentText">
                        <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
    
                    </div>
                </li>
            </ul> --}}
                                <form class="form-inline " action="{{route('addcomment')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded" name="comment"
                                            placeholder="Example comment" />
                                        <input type="hidden" name="course_id" value="{{$data->id}}">
                                        <button type="submit" class="btn btn-success"><i class="bi bi-pencil-fill"></i>
                                            Add Comment</button>
                                    </div>
                                    <div class="form-group">
                                        {{-- <button class="btn btn-success">Add</button> --}}
                                    </div>
                                </form>
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