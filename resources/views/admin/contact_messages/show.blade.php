<x-admin-layout>
    <h2>Bericht van: Yusuf Yildiz</h2>
    <br>
    <br>
    <form action="{{route('admin.contact_messages.destroy', $contactMessage)}}"
          method="post" class="d-flex flex-column gap-2 confirmForm">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label for="">Voornaam</label>
            <input type="text" class="form-control" disabled value="{{$contactMessage->firstname}}">
        </div>
        <div class="form-group">
            <label for="">Achternaam</label>
            <input type="text" class="form-control" disabled value="{{$contactMessage->lastname}}">
        </div>
        <div class="form-group">
            <label for="">Email adres</label>
            <input type="text" class="form-control" disabled value="{{$contactMessage->email}}">
        </div>
        <div class="form-group">
            <label for="">Tel. nummer</label>
            <input type="text" class="form-control" disabled value="{{$contactMessage->phone_number}}">
        </div>
        <div class="form-group">
            <label for="">Tel. nummer</label>
            <textarea cols="30" rows="10" class="form-control" disabled>{{$contactMessage->message}}</textarea>
        </div>
        <div class="form-group">
            <a href="mailto:{{$contactMessage->email}}" class="btn btn-info">Verstuur email</a>
            <input type="submit" value="Verwijderen" class="btn btn-danger">
        </div>
    </form>
</x-admin-layout>
