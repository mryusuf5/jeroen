<x-admin-layout>
    <h2>Klant toevoegen</h2>
    <div class="container">
        <form action="{{route('admin.customers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="">Foto</label>
                <input name="image" type="file" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <label for="">Voornaam <span class="text-danger">*</span></label>
                <input name="firstname" type="text" class="form-control">
                <span class="text-danger">@error('firstname'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Achternaam <span class="text-danger">*</span></label>
                <input name="lastname" type="text" class="form-control">
                <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Gender <span class="text-danger">*</span></label>
                <select name="gender" class="form-select">
                    <option value="0">Man</option>
                    <option value="1">Vrouw</option>
                </select>
                <span class="text-danger">@error('gender'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input name="email" type="email" class="form-control">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Tel. nummer <span class="text-danger">*</span></label>
                <input name="phone_number" type="number" class="form-control">
                <span class="text-danger">@error('phone_number'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Toevoegen">
            </div>
        </form>
    </div>
</x-admin-layout>
