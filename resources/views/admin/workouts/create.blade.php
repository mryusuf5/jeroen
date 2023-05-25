<x-admin-layout>
    <h2>Workout toevoegen</h2>
    <div class="container">
        <form id="newWorkoutForm" action="{{route('admin.workouts.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="">Titel <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                <span class="text-danger">@error('title'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Beschrijving <span class="text-danger">*</span></label>
{{--                <input type="text" class="form-control" name="description" value="{{old('description')}}">--}}
                <div id="editor2" style="height: 500px">
                </div>
                <textarea name="description" id="description" hidden cols="30" rows="10">
                </textarea>
                <span class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Workout type</label>
                <select name="type" id="" class="form-select">
                    <option value="">Selecteer type</option>
                    <option value="0">Tijd (minutes, seconden)</option>
                    <option value="1">Afstand (meters)</option>
                    <option value="2">Reps (rounds, reps)</option>
                </select>
                <span class="text-danger">@error('type'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Afbeelding <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="image">
                <span class="text-danger">@error('image'){{$message}}@enderror</span>
            </div>
{{--            <br>--}}
{{--            <div class="form-group">--}}
{{--                <label for="">Workout <span class="text-danger">*</span></label>--}}
{{--                <div id="editor" style="height: 500px">--}}
{{--                </div>--}}
{{--                <textarea name="workout" id="workout" hidden cols="30" rows="10">--}}
{{--                </textarea>--}}
{{--            </div>--}}
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Toevoegen">
            </div>
        </form>
    </div>
    <script>
        const form = document.querySelector('#newWorkoutForm');

        form.addEventListener('submit', function() {
            document.querySelector('#description').value = quill2.root.innerHTML;
        })

        var quill2 = new Quill('#editor2', {
            theme: 'snow'
        })
    </script>
</x-admin-layout>
