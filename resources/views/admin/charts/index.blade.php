@php
    use Illuminate\Http\Request;
    $type = request()->get('chartType');
@endphp

<x-admin-layout>
    <h2>Grafieken opstellen</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif
    <a class="btn btn-info mb-2" href="{{route('admin.charts.create')}}">Grafiek opstellen</a>
    @if($type === 'bars')
        <form action="" method="get">
            <input type="text" hidden value="line" name="chartType">
            <input type="submit" value="Lijn diagram" class="btn btn-primary">
        </form>
    @else
        <form action="" method="get">
            <input type="text" hidden value="bars" name="chartType">
            <input type="submit" value="Staaf diagram" class="btn btn-primary">
        </form>
    @endif
    <br>
    <br>
    @if($type === 'bars')
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="bg-danger" style="height: 20px; width: 50px;"></div>
                <span>Vet percentage</span>
            </div>
            <div class="">
                <div class="bg-info" style="height: 20px; width: 50px;"></div>
                <span>Gewicht in kg</span>
            </div>
        </div>
    @endif
    <div class="row g-md-4 g-0">
        @if($type === 'bars')
            @foreach($charts as $chart)
                <div class="col-lg-6 col-12 pb-md-0 pb-4">
                    @if($type === 'bars')
                        @foreach($chart->chart_data as $chart_data)
                            <div class="d-flex flex-column border border-primary p-2">
                                <div class="d-flex align-items-center mb-2">
                                    <h5 class="mb-0 px-2 w-50">{{date('d-m-Y', strtotime($chart_data->created_at))}}</h5>
                                    <div class="chartContainer w-100" style="height: 50px; position: relative">
                                        <div class="fat bg-danger" style="position: absolute; top: 0; left: 0; width: {{$chart_data->fat_percentage}}%; z-index: 999; height: 50px;"></div>
                                        <div class="weight bg-info" style="position: absolute; top: 0; left: 0; width: 100%; height: 50px;"></div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="w-50"></div>
                                    <div class="d-flex justify-content-between w-100">
                                        <h4>{{$chart_data->fat_percentage}}%</h4>
                                        <h4>{{$chart_data->weight}} Kilo</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <br>
                    <div class="d-flex justify-content-between">
                        <h5 class="">{{$chart->firstname . " " . $chart->lastname}}</h5>
                        <div class="dropdown">
                            <a class="text-info fs-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('admin.charts.edit', $chart->id, ['chartType' => 'bars'])}}" class="dropdown-item text-info">Bekijken</a>
                                </li>
                                <li>
                                    <form action="{{route('admin.charts.destroy', $chart->id)}}" class="confirmForm" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="dropdown-item text-danger" value="Verwijderen">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            @endforeach
        @endif

        @if($type === 'line')
            @foreach($charts as $chart)
                <div class="col-lg-6 col-md-6 col-12 pb-md-0 pb-4">
                    <canvas id="chart{{$chart->id}}"></canvas>
                    <br>
                    <div class="d-flex justify-content-between">
                        <h5 class="">{{$chart->firstname . " " . $chart->lastname}}</h5>
                        <div class="dropdown">
                            <a class="text-info fs-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('admin.charts.edit', $chart->id)}}" class="dropdown-item text-info">Bekijken</a>
                                </li>
                                <li>
                                    <form action="{{route('admin.charts.destroy', $chart->id)}}" class="confirmForm" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="dropdown-item text-danger" value="Verwijderen">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    @if($type === 'line')
        @section('scriptTop')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
        @endsection
        <script>
            @foreach($charts as $chart)

                new Chart(document.getElementById('chart{{$chart->id}}'), {
                    type: 'line',
                    data: {
                        labels: [
                            @foreach($chart->chart_data as $chart_data)
                            '{{date('d-m-Y', strtotime($chart_data->created_at))}}',
                            @endforeach
                        ],
                        datasets: [{
                            label: 'Gewicht in kg',
                            data: [
                                @foreach($chart->chart_data as $chart_data)
                                    {{$chart_data->weight}},
                                @endforeach
                            ],
                            borderWidth: 1
                        },{
                            label: 'Vet percentage',
                            data: [
                                @foreach($chart->chart_data as $chart_data)
                                    {{$chart_data->fat_percentage}},
                                @endforeach
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            @endforeach
        </script>
    @endif
</x-admin-layout>
