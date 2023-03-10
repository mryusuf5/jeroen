<x-admin-layout>
    <h2>Klanten</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif
    <a href="{{route('admin.customers.create')}}" class="btn btn-info">Klant toevoegen</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Afbeelding</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Tel. nummer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        @if($customer->image_path)
                        <td>
                            <div class="tableImage rounded-circle"
                                 style="background-image: url('{{asset('images/customers/' . $customer->image_path)}}')">
                            </div>
                        </td>
                        @else
                            <td class="tableImage fs-3 text-info text-center">
                                {{$customer->firstname[0] . " " . $customer->lastname[0]}}
                            </td>
                        @endif
                        <td>{{$customer->firstname}}</td>
                        <td>{{$customer->lastname}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone_number}}</td>
                        <td>
                            <div class="dropdown">
                                <a href="" class="" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical text-info fs-3"></i>
                                </a>
                                <ul class="dropdown-menu">
                                   <li>
                                       <a href="{{route('admin.customers.edit', $customer->id)}}"
                                          class="dropdown-item text-info">
                                           Aanpassen
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
