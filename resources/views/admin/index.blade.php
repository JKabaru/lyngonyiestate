@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    
                    <div class="col-md-12 d-flex justify-content-md-end">
                        <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                            <button class="btn btn-outline-primary" onclick="changeTimeFrame('daily')">Daily</button>
                            <button class="btn btn-outline-primary" onclick="changeTimeFrame('monthly')">Monthly</button>
                            <button class="btn btn-outline-primary" onclick="changeTimeFrame('yearly')">Yearly</button>
                        </div>
                    </div>
                    <hr>
                    <div id="curve_chart" style="width: 900px; height: 500px"></div>
           
                 </div>
            </div>
        </div>
    </div> <!-- row -->
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    var data = null;
    var options = {
        title: 'Casual Expenses',
        curveType: 'function',
        legend: { position: 'bottom' },
        backgroundColor: '#222', // Set background color to a dark color
        titleTextStyle: {
            color: '#fff' // Set title text color to white
        },
        hAxis: {
            textStyle: {
                color: '#fff' // Set horizontal axis text color to white
            },
            titleTextStyle: {
                color: '#fff' // Set horizontal axis title color to white
            },
        },
        vAxis: {
            textStyle: {
                color: '#fff' // Set vertical axis text color to white
            },
            titleTextStyle: {
                color: '#fff' // Set vertical axis title color to white
            },
        },
        series: {
            0: { color: '#ffeb3b' } // Set line color to a bright color
        }
    };

    // function drawChart() {
    //     var initialData = [
    //         ['Year', 'Sales'],
    //         // Initial data here
    //     ];
    //     data = google.visualization.arrayToDataTable(initialData);

    //     var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    //     chart.draw(data, options);
    // }

    function drawChart() {
    var initialData = [
        ['Day', 'Expense'],
        // Initial daily data here
        @foreach($dailydata as $row)
            ['{{ $row[0] }}', {{ $row[1] }}],
        @endforeach
    ];
    data = google.visualization.arrayToDataTable(initialData);

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    chart.draw(data, options);

    // Load the chart with daily data initially
    changeTimeFrame('daily');
}

    function changeTimeFrame(timeframe) {
        // Fetch data based on the selected timeframe
        var newData = fetchDataBasedOnTimeframe(timeframe);

        // Update the chart data
        data = google.visualization.arrayToDataTable(newData);

        // Redraw the chart with updated data
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
    }

    // Function to fetch data based on the selected timeframe
    function fetchDataBasedOnTimeframe(timeframe) {
        // Implement logic to fetch data based on the selected timeframe
        // Replace the following with your actual data fetching logic
        switch (timeframe) {
            case 'monthly':
                return [
                    ['Month', 'Expense'],
                    // Monthly data here
                    @foreach($monthlydata as $row)
                        ['{{ $row[0] }}', {{ $row[1] }}],
                    @endforeach
                ];
            case 'daily':
                return [
                    ['Day', 'Expense'],
                    // Daily data here
                    @foreach($dailydata as $row)
                        ['{{ $row[0] }}', {{ $row[1] }}],
                    @endforeach
                ];
            case 'yearly':
                return [
                    ['Year', 'Expense'],
                    // Yearly data here
                    @foreach($data as $row)
                        ['{{ $row[0] }}', {{ $row[1] }}],
                    @endforeach
                ];
            default:
                return [];
        }
    }
</script>



@endsection
