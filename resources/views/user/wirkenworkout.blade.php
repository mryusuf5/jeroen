<x-user-layout>
    <div class="bg-dark workoutsBackground singleWorkoutBackground">
        <br>
        <div class="container border border-info">
            <div class="d-flex justify-content-center">
                <img src="{{asset('images/workouts/' . $workout->image_path)}}" alt="" class="singleWorkoutImage">
            </div>
            <div class="w-100 border border-info"></div>
            <div class="workoutContainer text-white">
                <h2>{{$workout->title}}</h2>
                <h3>{{$workout->description}}</h3>
                {!! $workout->body !!}
            </div>
        </div>
    </div>
</x-user-layout>
