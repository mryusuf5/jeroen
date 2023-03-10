<x-user-layout>
    <div class="bg-dark z-0">
        <br>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide border border-info" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="0" class="active"></button>

                    <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="1"></button>

                    <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('images/klanten.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/klanten2.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/klanten3.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <br>
        <div class="container d-flex justify-content-center">
            <div class="screen">
                <div class="screen-image" style="background-image: url('{{asset("images/jeroen2.jpg")}}')"></div>
{{--                <div class="screen-overlay"></div>--}}
                <div class="screen-content">
                    <div class="screen-user">
                        <span class="name">WW</span>
                        <a class="link" href="{{route('wirkenWorkouts')}}">Wirken workouts</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row g-0 justify-content-center gap-4 mt-4">
            <div class="col-lg-5 col-10">
                <h2 class="text-white mb-2">Personal training <span class="text-info">en meer</span></h2>
                <p class="text-white"><i class="fa-solid fa-people-arrows text-info"></i> 1 op 1 personal training</p>
                <p class="text-white"><i class="fa-solid fa-calculator text-info"></i> Individuele begeleiding op maat</p>
                <p class="text-white"><i class="fa-solid fa-apple-whole text-info"></i> Gepersonaliseerd voedingsadvies</p>
                <p class="text-white"><i class="fa-solid fa-person-circle-check text-info"></i> Persoonlijke aanpak</p>
                <p class="text-white fw-bold"><i class="fa-solid fa-check text-info"></i> Voor alle niveau's en leeftijden</p>
                <div>
                    <a href="" class="btn btn-info col-lg-5 col-12 rounded-pill text-white">Contacteer mij!</a>
                </div>
            </div>
            <div class="heroImage col-lg-1 col-10"></div>
        </div>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row gap-2 justify-content-center g-0">
                <h3 class="text-info text-center mb-3">Reviews van klanten</h3>
                @for($i = 0; $i < 8; $i++)
                <div class="d-flex justify-content-center flex-column col-lg-4
                col-12 border border-info p-2 gap-2 rounded reviewContainer">
                    <div class="d-flex gap-2 align-items-center">
                        <img src="{{asset('images/ik2.jpg')}}"
                             class="object-fit-cover rounded-circle" height="150" width="150" alt="">
                        <div>
                            <h5 class="text-info">Yusuf Yildiz</h5>
                            <div class="text-warning">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top border-info"></div>
                    <div>
                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt eum in nobis quisquam. Ad alias animi blanditiis delectus distinctio eum, excepturi facere in laudantium minima saepe tempora totam vitae voluptate?</p>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</x-user-layout>
