<x-admin-layout>
    <h2>Workout aanpassen</h2>
    <div class="container">
        <form id="editWorkoutForm" action="{{route('admin.workouts.update', $workout->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Titel</label>
                <input type="text" class="form-control" name="title" value="{{$workout->title}}">
                <span class="text-danger">@error('title'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Beschrijving</label>
                <input type="text" class="form-control" name="description" value="{{$workout->description}}">
                <span class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <div class="d-flex flex-column">
                    <label for="">Afbeelding</label>
                    <img class="editImage" src="{{asset('images/workouts/' . $workout->image_path)}}" alt="">
                </div>
                <input type="file" class="form-control" name="image">
            </div>
            <br>
            <div class="form-group">
                <label for="">Workout</label>
                <div id="editor" style="height: 500px">
                    {!! $workout->body !!}
                </div>
                <textarea name="workout" id="editWorkout" hidden cols="30" rows="10"></textarea>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Toevoegen">
            </div>
        </form>
    </div>
    <script>
        const form = document.querySelector('#editWorkoutForm');

        form.addEventListener('submit', function() {
            document.querySelector('#editWorkout').value = quill.root.innerHTML;
        })
    </script>
</x-admin-layout>
