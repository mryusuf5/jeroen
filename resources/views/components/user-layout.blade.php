<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('')}}css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('')}}css/style.css">
    <link rel="stylesheet" href="{{asset('')}}css/futuristicCard.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="{{asset('')}}js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <title>Wirken Sports</title>
</head>
<body>
    <div class="bg-primary d-flex p-1 justify-content-around">
        <div class="d-flex gap-3">
            <a href="mailto:j.wirken@live.nl" class="text-white text-decoration-none d-flex align-items-center gap-2">
                <i class="fa-regular fa-envelope-open"></i> <span class="d-md-block d-none">j.wirken@live.nl</span>
            </a>
            <a href="tel:+31 629 792 244" class="text-white text-decoration-none d-flex align-items-center gap-2">
                <i class="fa-solid fa-phone"></i> <span class="d-md-block d-none">+31 629 792 244</span>
            </a>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="https://www.instagram.com/jeroenwirken/" target="_blank" class="text-white">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/jeroen.wirken" target="_blank" class="text-white">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://www.tiktok.com/@sportvisioneindhoven" target="_blank" class="text-white">
                <i class="fa-brands fa-tiktok"></i>
            </a>
{{--            <a href="" class="text-white">--}}
{{--                <i class="fa-brands fa-linkedin-in"></i>--}}
{{--            </a>--}}
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{route('home')}}">Jeroen Wirken</a>
            <button class="navbar-toggler border border-white" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="text-white"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active text-white" aria-current="page" href="#">Prijzen</a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link text-white" href="
                        @if(Route::is('home')) #over-mij
                        @else {{route('home') . '#over-mij'}} @endif">Over mij</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Diplomas/certificaten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Verkoop</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://jeroen.yusufyildiz.nl/js/script.js"></script>
</body>
</html>
