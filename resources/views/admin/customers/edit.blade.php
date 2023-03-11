<x-admin-layout>
    <h2>Klant aanpassen</h2>
    <div class="container">
        <form action="{{route('admin.customers.update', $customer->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <p for="">Foto</p>
                <img class="editImage" src="{{asset('images/customers/' . $customer->image_path)}}" alt="">
                <br>
                <br>
                <input name="image" type="file" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <label for="">Voornaam</label>
                <input name="firstname" type="text" class="form-control" value="{{$customer->firstname}}">
            </div>
            <br>
            <div class="form-group">
                <label for="">Achternaam</label>
                <input name="lastname" type="text" class="form-control" value="{{$customer->lastname}}">
            </div>
            <br>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" value="{{$customer->email}}">
            </div>
            <br>
            <div class="form-group">
                <label for="">Tel. nummer</label>
                <input name="phone_number" type="number" class="form-control" value="{{$customer->phone_number}}">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Aanpassen">
            </div>
        </form>
        <br>
        <form action="{{route('admin.customers.destroy', $customer->id)}}" method="post" class="confirmForm">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Verwijderen">
        </form>
    </div>
</x-admin-layout>
