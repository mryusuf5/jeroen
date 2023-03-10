<x-admin-layout>
    <h2>Workout toevoegen</h2>
    <div class="container">
        <form id="newWorkoutForm" action="{{route('admin.workouts.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="">Titel</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                <span class="text-danger">@error('title'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Beschrijving</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}">
                <span class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Afbeelding</label>
                <input type="file" class="form-control" name="image">
                <span class="text-danger">@error('image'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Workout</label>
                <div id="editor" style="height: 500px">
                </div>
                <textarea name="workout" id="workout" hidden cols="30" rows="10">
                </textarea>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Toevoegen">
            </div>
        </form>
    </div>
    <script>
        const form = document.querySelector('#newWorkoutForm');

        form.addEventListener('submit', function() {
            document.querySelector('#workout').value = quill.root.innerHTML;
        })
    </script>
</x-admin-layout>
