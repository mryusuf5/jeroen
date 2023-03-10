<x-user-layout>
    <div class="bg-dark workoutsBackground">
        <br>
        <div class="container">
            @foreach($workouts as $index => $workout)
                @if($index %2 == 0)
                    <div class="text-white d-flex align-items-md-center align-items-start
                     flex-md-row flex-column gap-2 border border-info rounded p-1">
                        <div>
                            <img class="workoutImage object-fit-cover" src="{{asset('images/workouts/' . $workout->image_path)}}" alt="">
                        </div>
                        <div>
                            <h2><a href="{{route('singleWorkout', $workout->id)}}" class="text-info">{{$workout->title}}</a></h2>
                            <div>{{$workout->description}}</div>
                        </div>
                    </div>
                    <br>
                @else
                    <div class="text-white d-flex align-items-md-center align-items-start
                     flex-md-row flex-column gap-2 border border-info rounded p-1 justify-content-end">
                        <div>
                            <h2><a href="{{route('singleWorkout', $workout->id)}}" class="text-info">{{$workout->title}}</a></h2>
                            <div>{{$workout->description}}</div>
                        </div>
                        <div>
                            <img class="workoutImage object-fit-cover" src="{{asset('images/workouts/' . $workout->image_path)}}" alt="">
                        </div>
                    </div>
                    <br>
                @endif
            @endforeach
        </div>
    </div>
</x-user-layout>
