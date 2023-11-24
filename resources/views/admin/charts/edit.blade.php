@php
    use Illuminate\Http\Request;
    $type = request()->get('chartType');
@endphp

<x-admin-layout>
    <h2>Grafiek aanpassen</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif
    @if($type === 'line')
        <form action="" method="get">
            <input type="text" hidden value="bars" name="chartType">
            <input type="submit" value="Staaf diagram" class="btn btn-primary">
        </form>
    @else
        <form action="" method="get">
            <input type="text" hidden value="line" name="chartType">
            <input type="submit" value="Lijn diagram" class="btn btn-primary">
        </form>
    @endif
    <br>
    @if($type !== 'line')
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
    <br>
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            @if($type === 'line')
                <canvas id="chart"></canvas>
            @else
                @foreach($chart->chart_data as $chart_data)
                    <div class="d-flex flex-column border border-primary p-2">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="mb-0 px-2 w-25">{{date('d-m-Y', strtotime($chart_data->created_at))}}</h5>
                            <div class="chartContainer w-100" style="height: 50px; position: relative">
                                <div class="fat bg-danger" style="position: absolute; top: 0; left: 0;
                                width: {{$chart_data->fat_percentage}}%; z-index: 999; height: 50px;"></div>
                                <div class="weight bg-info" style="position: absolute; top: 0; left: 0; width: 100%;
                                 height: 50px;"></div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="w-25"></div>
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{$chart_data->fat_percentage}}%</h4>
                                <h4>{{$chart_data->weight}} Kilo</h4>
                            </div>
                        </div>
                        <form action="{{route('admin.chart_data.destroy', $chart_data->id)}}" method="post"
                              class="confirmForm">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Verwijderen">
                        </form>
                        <br>
                        @if($chart_data->message)
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal{{$chart_data->id}}">Open opmerking</button>
                            <div class="modal fade" id="messageModal{{$chart_data->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            {{$chart_data->message}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12">
            <form action="{{route('admin.charts.update', $chart->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="text" hidden name="customer_id" value="{{$chart->chart_data[0]->customer_id}}">
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
                    <input type="submit" class="btn btn-info" value="Toevoegen">
                </div>
            </form>
        </div>
    </div>

    @if($type === 'line')
        @section('scriptTop')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
        @endsection
        <script>
            new Chart(document.getElementById('chart'), {
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
        </script>
    @endif
</x-admin-layout>
