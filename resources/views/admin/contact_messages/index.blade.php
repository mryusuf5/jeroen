<x-admin-layout>
    <h2>Contact berichten</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Tel. nummer</th>
                    <th>Bericht</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($contact_messages as $contact_message)
                <tr>
                    <td>{{$contact_message->firstname}}</td>
                    <td>{{$contact_message->lastname}}</td>
                    <td>{{$contact_message->email}}</td>
                    <td>{{$contact_message->phone_number}}</td>
                    <td>{{Str::limit($contact_message->message, 25)}}</td>
                    <td>
                        <div class="dropdown">
                            <a class="text-info fs-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item text-info"
                                       href="{{route('admin.contact_messages.show', $contact_message)}}">
                                        Bekijken
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
