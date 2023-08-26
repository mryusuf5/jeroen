<x-user-layout>
    <div class="checkered z-0">
        <br>
        <div class="container d-flex justify-content-center">
            <div id="carouselExampleIndicators" class="carousel slide border border-info" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($images as $index => $image)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{$index}}" class="active"></button>
                    @endforeach
                </div>
                <div class="carousel-inner carousel-inner-images">
                    @foreach($images as $index => $image)
                    <div class="carousel-item @if($index == 0) active @endif ">
                        <img src="{{asset('images/carousel/' . $image->image_path)}}" class="d-block w-100">
                    </div>
                    @endforeach
                    <img class="position-absolute watermark" src="{{asset('images/logo.png')}}" alt="">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <br>
        <div class="container d-flex justify-content-center">
            <div class="screen">
                <div class="screen-image" style="background-image: url('{{asset("images/jeroen2.jpg")}}')"></div>
                <div class="screen-content">
                    <a href="{{route('wirkenWorkouts')}}" class="link text-info" style="position: absolute; top: 15%; left: 50%; transform: translate(-50%, -50%); width: 65%; text-align: center">
                        Ben je al een klant? zie hier je behaalde resultaten!
                    </a>
                    <div class="screen-user">
                        <span class="name">WW</span>
                        <a class="link" href="{{route('wirkenWorkouts')}}">Wirken workouts</a>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="container" id="diplomas">
            <h3 class="text-info text-center">Mijn behaalde diploma's en certificaten</h3>
            <hr>
            <div class="container d-flex justify-content-center">
                <div id="carouselExampleIndicators2" class="carousel slide border border-info" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($diplomas as $index => $image)
                            <button type="button" data-bs-target="#carouselExampleIndicators2"
                                    data-bs-slide-to="{{$index}}" class="active"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner carousel-inner-diplomas" id="carouselContainer">
                        @foreach($diplomas as $index => $image)
                            <div class="carousel-item @if($index == 0) active @endif ">
                                <img src="{{asset('images/diplomas/' . $image->image_path)}}" class="d-block w-100">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <br>
        <div class="container" id="over-mij">
            <div class="row justify-content-center gap-2">
                <h3 class="text-info text-center">Over mij</h3>
                <hr>
                <div class="col-lg-6 col-12">
                    <p class="fs-3">
                        Welkom op mijn Personal Training website!
                        <br>
                        Ik ben <span class="text-info">Jeroen Wirken</span>, een gepassioneerde personal trainer,
                        judoka en instructeur.
                        <br>
                        Met mijn brede kennis en ervaring in de sportschool in diverse vecht- en verdedigingssporten,
                        fitness, CrossFit en calisthenics, help ik mensen om hun fysieke doelen te behalen en hun kracht
                        en vaardigheden te ontwikkelen.

                        Of je nu je algehele fitheid wilt verbeteren, spierkracht wilt opbouwen, uithoudingsvermogen
                        wilt verhogen of lichaamsbeheersing wilt ontwikkelen, ik bied op maat gemaakte trainingen aan
                        die passen bij jouw behoeften en doelen.
                    </p>
                </div>
                <div class="heroImage2 col-lg-5 col-12"></div>
                <div class="heroImage3 col-lg-5 col-12"></div>
                <div class="col-lg-6 col-12">
                    <p class="fs-3">
                        Als judoka ben ik trots op mijn zwarte band 2de Dan.
                        <br>
                        Ik heb jarenlang intensief getraind en meegedaan aan judowedstrijden, waarbij ik mijn techniek
                        en doorzettingsvermogen heb verfijnd, op deze pure wilskracht en techniek heb ik ook al mijn
                        vier MMA partijen gewonnen.
                    </p>
                </div>
                <div class="col-12">
                    <p class="fs-3">
                        Neem vandaag nog contact met mij op en laten we samen aan de slag gaan met jouw persoonlijke
                        trainingstraject!
                        <br>
                        <a href="#contact" class="text-info">Klik hier voor meer info!</a>
                    </p>
                </div>
                <div class="heroImage4 col-lg-5 col-12"></div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="container" id="contact">
            <div class="row g-0 justify-content-center gap-4 mt-4">
                <div class="col-lg-5 col-10">
                    <h2 class="text-white mb-2">Personal training <span class="text-info">en meer</span></h2>
                    <hr>
                    <p class="text-white">
                        <i class="fa-solid fa-people-arrows text-info"></i> Personal training / small group training
                    </p>
                    <p class="text-white">
                        <i class="fa-solid fa-calculator text-info"></i> Individuele begeleiding op maat
                    </p>
                    <p class="text-white">
                        <i class="fa-solid fa-apple-whole text-info"></i> Gepersonaliseerd voedingsadvies
                    </p>
                    <p class="text-white">
                        <i class="fa-solid fa-person-circle-check text-info"></i> Persoonlijke aanpak
                    </p>
                    <p class="text-white fw-bold">
                        <i class="fa-solid fa-check text-info"></i> Voor alle niveau's en leeftijden
                    </p>
                    <div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                           class="btn btn-info col-lg-5 col-12 rounded-pill text-white">Contacteer mij!</a>
                    </div>
                </div>
                <div class="heroImage col-lg-5 col-10"></div>
            </div>
        </div>

        <div class="container">
            <div class="row gap-2 justify-content-center g-0">
                <h3 class="text-info text-center mb-3">Reviews van klanten</h3>
                <hr>
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
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Jeroen contacteren</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="contactForm" action="{{route('storeMessage')}}">
                @csrf
                @method('POST')
                <div class="modal-body d-flex flex-column gap-2">
                    <div class="form-group">
                        <label for="">Voornaam<span class="text-danger">*</span></label>
                        <input type="text" class="form-control contactInput" name="firstname">
                        <span class="text-danger" id="errorfirstname">@error('firstname'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Achternaam<span class="text-danger">*</span></label>
                        <input type="text" class="form-control contactInput" name="lastname">
                        <span class="text-danger" id="errorlastname">@error('lastname'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Email adres<span class="text-danger">*</span></label>
                        <input type="email" class="form-control contactInput" name="email">
                        <span class="text-danger" id="erroremail">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Telefoon nummer<span class="text-danger">*</span></label>
                        <input type="number" class="form-control contactInput" name="phone_number">
                        <span class="text-danger" id="errorphone_number">@error('phone_number'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Bericht<span class="text-danger">*</span></label>
                        <textarea name="message" class="form-control contactInput errormessage" cols="30" rows="10"></textarea>
                        <span class="text-danger" id="errormessage">@error('message'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Verstuur bericht" class="btn btn-info text-white">
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        @if($message = Session::get('success'))
            Toastify({
                text: "{{$message}}",
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "center", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: '#0DCAF0'
                },
                onClick: function(){} // Callback after click
            }).showToast();
        @endif

        window.addEventListener('load', function() {
            var images = document.querySelectorAll("#carouselContainer img");
            var imageHeight = images[0].height;

            images[0].addEventListener('load', function() {
                imageHeight = this.height;
                document.getElementById("carouselContainer").style.height = imageHeight + 'px';
            });

            // Fallback for cases where the load event might not fire
            setTimeout(function() {
                document.getElementById("carouselContainer").style.height = imageHeight + 'px';
            }, 2000);
    </script>
</x-user-layout>
