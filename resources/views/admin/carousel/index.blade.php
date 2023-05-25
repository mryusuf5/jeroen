<x-admin-layout>
    <h2>Carousel Foto's</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif
    <a href="{{route('admin.carousel.create')}}" class="btn btn-info">Foto toevoegen</a>
    <br>
    <br>
    <div class="images row g-0 justify-content-center gap-2">
        @foreach($images as $image)
            <div class="d-flex flex-column gap-2 col-md-3 col-10">
                <img src="{{asset('images/carousel/' . $image->image_path)}}" class="object-fit-cover" alt="">
                <form action="{{route('admin.carousel.destroy', $image->id)}}" method="post" class="confirmForm">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger w-100" value="Verwijderen">
                </form>
            </div>
        @endforeach
    </div>
</x-admin-layout>
