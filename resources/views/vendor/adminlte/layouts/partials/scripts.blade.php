<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>

<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
@if(Route::currentRouteName() == 'single_user')
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Cash by this day'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
                day: '%Y-%b-%e'
            },
            title: {
                text: 'Date'
            }
        },
        yAxis: {
            title: {
                text: 'Cash ($)'
            },
            min: 0
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br>',
            pointFormat: 'Продано : {point.y:.2f} шт'
        },

        plotOptions: {
            spline: {
                marker: {
                    enabled: true
                }
            }
        },

        series: [{
            name: 'Заработано за день {{$total}} $',
            data: [
                @php

                    foreach($stats as $stat)
                    {
                       $date = $stat->created_at;
                       $date = explode('-',$date);

                       echo "[Date.UTC($date[0], $date[1], $date[2]), $stat->DateCount],";
                    }

                @endphp
//                [Date.UTC(1970, 9, 21), 0],
//                [Date.UTC(1970, 10, 4), 0.28],
//                [Date.UTC(1970, 10, 9), 0.25],
//                [Date.UTC(1970, 10, 27), 0.2],
//                [Date.UTC(1970, 11, 2), 0.28],
//                [Date.UTC(1970, 11, 26), 0.28],
//                [Date.UTC(1970, 11, 29), 0.47],
//                [Date.UTC(1971, 0, 11), 0.79],
//                [Date.UTC(1971, 0, 26), 0.72],
//                [Date.UTC(1971, 1, 3), 1.02],
//                [Date.UTC(1971, 1, 11), 1.12],
//                [Date.UTC(1971, 1, 25), 1.2],
//                [Date.UTC(1971, 2, 11), 1.18],
//                [Date.UTC(1971, 3, 11), 1.19],
//                [Date.UTC(1971, 4, 1), 1.85],
//                [Date.UTC(1971, 4, 5), 2.22],
//                [Date.UTC(1971, 4, 19), 1.15],
//                [Date.UTC(1971, 5, 3), 0]
            ]
        }]
    });
</script>
@endif
<script src="{{asset('/js/custom.js')}}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
