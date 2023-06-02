<x-user-layout>
    <div class="checkered">
        <br>
        <div class="container border border-info">
            <div class="d-flex justify-content-center">
                <img src="{{asset('images/workouts/' . $workout->image_path)}}" alt="" class="singleWorkoutImage">
            </div>
            <div class="w-100 border border-info"></div>
            <div class="workoutContainer text-white">
                <h2>{{$workout->title}}</h2>
                <h3>{!! $workout->description !!}</h3>
                <div class="workoutBody">{!! $workout->body !!}</div>
            </div>
        </div>
        <br>
        <div class="container leaderboardContainer">
            <div class="table-responsive">
                @if(Session::get('admin'))<a href="#" data-bs-toggle="modal" data-bs-target="#addModal"
                   class="btn btn-info text-white">Voeg deelnemer toe</a>@endif
                <table class="table table-striped" style="min-width: 800px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam</th>
                        <th>
                            @if($workout->type == 0)
                                Tijd
                            @elseif($workout->type == 1)
                                Afstand
                            @elseif($workout->type == 2)
                                Repetitions
                            @endif</th>
                        <th>Opmerking</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($leaderboards as $index => $leaderboard)
                    <tr>
                        <td>
                            @if($index === 0)
                                <img width="50" src="{{asset('images/1st.png')}}" alt="">
                            @elseif($index === 1)
                                <img width="50" src="{{asset('images/2nd.png')}}" alt="">
                            @elseif($index === 2)
                                <img width="50" src="{{asset('images/3rd.png')}}" alt="">
                            @else
                                <span>{{$index + 1}}</span>
                            @endif
                        </td>
                        @if(!Session::get('admin'))
                            @if(!$leaderboard->anonymous)
                                @if($leaderboard->image_path)
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <img src="{{asset('images/customers/' . $leaderboard->image_path)}}" height="75"
                                             width="75" class="object-fit-cover rounded-circle">
                                        <span @if($index == 0 || $index == 1 || $index == 2)
                                                  class="leaderboardWinner"
                                            @endif>{{$leaderboard->firstname . ' ' . $leaderboard->lastname}}</span>
                                    </div>
                                </td>
                                @else
                                    <td class="">
                                        <span class="tableImage fs-3 text-info">
                                            {{$leaderboard->firstname[0] . " " . $leaderboard->lastname[0]}}
                                        </span>
                                        <span @if($index == 0 || $index == 1 || $index == 2)
                                                  class="leaderboardWinner"
                                            @endif>{{$leaderboard->firstname . ' ' . $leaderboard->lastname}}</span>
                                    </td>
                                @endif
                            @else
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <img src="{{asset('images/customers/default.png')}}" height="75" width="75"
                                             class="object-fit-cover rounded-circle">
                                        <span @if($index == 0 || $index == 1 || $index == 2)
                                                  class="leaderboardWinner"
                                            @endif>Anoniem</span>
                                    </div>
                                </td>
                            @endif
                        @else
                            @if($leaderboard->image_path)
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <img src="{{asset('images/customers/' . $leaderboard->image_path)}}" height="75" width="75"
                                             class="object-fit-cover rounded-circle">
                                        <span @if($index == 0 || $index == 1 || $index == 2)
                                                  class="leaderboardWinner"
                                            @endif>{{$leaderboard->firstname . ' ' . $leaderboard->lastname}}</span>
                                    </div>
                                </td>
                            @else
                                <td class="">
                                    <span class="tableImage fs-3 text-info">
                                        {{$leaderboard->firstname[0] . " " . $leaderboard->lastname[0]}}
                                    </span>
                                    <span @if($index == 0 || $index == 1 || $index == 2)
                                              class="leaderboardWinner"
                                            @endif>{{$leaderboard->firstname . ' ' . $leaderboard->lastname}}</span>
                                </td>
                            @endif
                        @endif
                        <td>
                            @if($workout->type == 0)
                                {{$leaderboard->time}}
                            @elseif($workout->type == 1)
{{--                                @php--}}
{{--                                $afstand = explode(',', $leaderboard->time);--}}
{{--                                foreach($afstand as $e)--}}
{{--                                    {--}}
{{--                                        if(!strlen($e) < 3)--}}
{{--                                            {--}}
{{--                                                echo $e . ' Meter';--}}
{{--                                            }--}}
{{--                                    }--}}
{{--                                @endphp--}}
                                {{$leaderboard->seconds}} meters
                            @elseif($workout->type == 2)
                                {{$leaderboard->seconds}} repetitions
                            @endif
                        </td>
                        <td>{!! $leaderboard->remark !!}</td>
                        @if(Session::get('admin'))
                            <td>
                                <form action="{{route('admin.leaderboards.destroy', $leaderboard->id)}}"
                                      class="confirmForm" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Verwijderen">
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{route('admin.leaderboards.store')}}" method="post" id="leaderboardForm">
            @csrf
            @method('POST')
            <input type="text" hidden name="workout_id" value="{{$workout->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Deelnemer toevoegen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column gap-2">
                        <div class="form-group">
                            <select name="customer_id" class="form-control">
                                <option value="">Selecteer klant</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">
                                        {{$customer->firstname . ' ' . $customer->lastname}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @if($workout->type == 0)
                            <div class="form-group" id="minutes">
                                <label for="">Minuten</label>
                                <input type="number" name="minutes" class="form-control">
                            </div>
                            <div class="form-group" id="seconds">
                                <label for="">Seconden</label>
                                <input type="number" name="seconds" class="form-control">
                            </div>
                        @elseif($workout->type == 1)
                            <div class="form-group" id="kilometers">
                                <label for="">Kilometers</label>
                                <input type="number" name="minutes" class="form-control">
                            </div>
                            <div class="form-group" id="meters">
                                <label for="">Meters</label>
                                <input type="number" name="seconds" class="form-control">
                            </div>
                        @elseif($workout->type == 2)
                            <div class="form-group" id="repetitions">
                                <label for="">Repetitions</label>
                                <input type="number" name="seconds" class="form-control">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="">Opmerking</label>
                            <div id="editor" style="height: 500px">
                            </div>
                            <textarea name="remark" id="remark" hidden cols="30" rows="10">
                            </textarea>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="anonymous">
                            <label class="form-check-label">Maak anoniem</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Toevoegen</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        confirmForm = document.querySelectorAll('.confirmForm');

        confirmForm.forEach((e) => {
            e.addEventListener('submit', form => {
                form.preventDefault();
                Swal.fire({
                    title: 'Weet je zeker dat je dit wilt verwijderen?',
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Nee',
                    confirmButtonText: 'Ja',
                    confirmButtonColor: '#03C3EC',
                    cancelButtonColor: '#FF3E1D'
                }).then(result => {
                    if(result.isConfirmed)
                    {
                        form.target.submit();
                    }
                });
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        const form = document.querySelector('#leaderboardForm');

        form.addEventListener('submit', () => {
            document.querySelector('#remark').value = quill.root.innerHTML;
        })

        var quill = new Quill('#editor', {
            theme: 'snow'
        })
    </script>
</x-user-layout>
