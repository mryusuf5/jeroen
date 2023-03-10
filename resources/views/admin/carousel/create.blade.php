<x-admin-layout>
    <h2>Carousel foto toevoegen</h2>
    <div class="container">
        <form action="{{route('admin.carousel.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="">Foto</label>
                <input name="image" type="file" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Toevoegen">
            </div>
        </form>
    </div>
</x-admin-layout>
