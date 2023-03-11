<x-admin-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

    <h2>Grafieken opstellen</h2>
    @if($message = Session::get('success'))
        <div class="alert alert-info">
            <h3 class="text-info">{{$message}}</h3>
        </div>
    @endif
    <a class="btn btn-info" href="{{route('admin.charts.create')}}">Grafiek opstellen</a>
    <br>
    <br>
    <div class="row g-md-4 g-0">
        @foreach($charts as $chart)
            <div class="col-lg-6 col-md-6 col-12 pb-md-0 pb-4">
                <canvas id="chart{{$chart->id}}"></canvas>
                <br>
                <div class="d-flex justify-content-between">
                    <a href="{{route('admin.charts.edit', $chart->id)}}" class="btn btn-info">Bekijken</a>
                    <h5 class="">{{$chart->firstname . " " . $chart->lastname}}</h5>
                    <form action="{{route('admin.charts.destroy', $chart->id)}}" class="confirmForm" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Verwijderen">
                    </form>
                </div>
            </div>
        @endforeach
    </div>

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
</x-admin-layout>
