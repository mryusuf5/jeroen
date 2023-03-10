<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/futuristicCard.css')}}">
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <title>Jeroen Wirken</title>
</head>
<body>
    <div class="bg-primary d-flex p-1 justify-content-around">
        <div class="d-flex gap-3">
            <a href="" class="text-white text-decoration-none d-flex align-items-center gap-2">
                <i class="fa-regular fa-envelope-open"></i> <span class="d-md-block d-none">Jeroenwirken@hotmail.com</span>
            </a>
            <a href="" class="text-white text-decoration-none d-flex align-items-center gap-2">
                <i class="fa-solid fa-phone"></i> <span class="d-md-block d-none">+31 468 111 352</span>
            </a>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="" class="text-white">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="" class="text-white">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="" class="text-white">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="" class="text-white">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{route('home')}}">Jeroen wirken</a>
            <button class="navbar-toggler border border-white" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="text-white"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Prijzen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Over mij</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('wirkenWorkouts')}}">Wirken workouts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{$slot}}
    <x-user-footer />
