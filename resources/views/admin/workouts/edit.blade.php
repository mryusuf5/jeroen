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
                <div id="editor2" style="height: 500px">
                    {!! $workout->description !!}
                </div>
                <textarea name="description" id="editDescription" hidden cols="30" rows="10"></textarea>
                <span class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Workout type</label>
                <select name="type" class="form-select">
                    <option value="">Selecteer type</option>
                    <option value="0">Tijd (minutes, seconden)</option>
                    <option value="1">Afstand (meters)</option>
                    <option value="2">Reps (rounds, reps)</option>
                </select>
                <span class="text-danger">@error('type'){{$message}}@enderror</span>
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
{{--            <div class="form-group">--}}
{{--                <label for="">Workout</label>--}}
{{--                <div id="editor" style="height: 500px">--}}
{{--                    {!! $workout->body !!}--}}
{{--                </div>--}}
{{--                <textarea name="workout" id="editWorkout" hidden cols="30" rows="10"></textarea>--}}
{{--            </div>--}}
{{--            <br>--}}
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Toevoegen">
            </div>
        </form>
    </div>
    <script>
        const form = document.querySelector('#editWorkoutForm');

        form.addEventListener('submit', function() {
            document.querySelector('#editDescription').value = quill2.root.innerHTML;
        })

        var quill2 = new Quill('#editor2', {
            theme: 'snow'
        })
    </script>
</x-admin-layout>
