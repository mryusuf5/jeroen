<x-admin-layout>
    <h2>Grafiek opstellen</h2>
    <div class="container">
        <form action="{{route('admin.charts.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="">Selecteer een klant <span class="text-danger">*</span></label>
                <select name="customer_id" class="form-control">
                    <option value="">Selecteer een klant</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->firstname . ' ' . $customer->lastname}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('customer'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Gewicht in kg <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="weight">
                <span class="text-danger">@error('weight'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Vet percentage <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="fat_percentage">
                <span class="text-danger">@error('fat_percentage'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <label for="">Datum</label>
                <input type="date" class="form-control" name="date">
            </div>
            <br>
            <div class="form-group">
                <label for="">Opmerking <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="message">
                <span class="text-danger">@error('fat_percentage'){{$message}}@enderror</span>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" value="Toevoegen" class="btn btn-info">
            </div>
        </form>
    </div>
</x-admin-layout>
