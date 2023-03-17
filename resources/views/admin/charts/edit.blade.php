<x-admin-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <h2>Grafiek aanpassen</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <canvas id="chart"></canvas>
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
                    <input type="submit" class="btn btn-info" value="Toevoegen">
                </div>
            </form>
        </div>
    </div>

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
</x-admin-layout>
