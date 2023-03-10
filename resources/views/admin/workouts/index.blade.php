<x-admin-layout>
    <h2>Workouts</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif
    <a href="{{route('admin.workouts.create')}}" class="btn btn-info">Workout toevoegen</a>
    <br>
    <br>
    <div class="row g-2 justify-content-lg-start justify-content-center">
        @foreach($workouts as $workout)
            <div class="card col-lg-4 col-10">
                <img src="{{asset('images/' . $workout->image_path)}}" class="card-image-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$workout->title}}</h5>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('admin.workouts.edit', $workout->id)}}" class="btn btn-info">Aanpassen</a>
                        <form action="{{route('admin.workouts.destroy', $workout->id)}}" method="post" class="confirmForm">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Verwijderen" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
