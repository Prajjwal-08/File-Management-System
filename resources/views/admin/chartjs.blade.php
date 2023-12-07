
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  </head>
  <body>
    <div class="">
      <div id="piechart" style="width: 900px; height: 500px;"></div>
      <div id="columnchart_values" style="width: 900px; height: 300px;"></div></div>
  </body>
</html>
{{-- ============================= --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>google.charts.load('current', {
packages: ['corechart', 'bar']
});
google.charts.setOnLoadCallback(drawColColors);
function drawChart() {
      ;}

function drawColColors() {
var data = new google.visualization.DataTable();
data.addColumn('timeofday', 'Time of Day');
data.addColumn('number', 'Motivation Level');
data.addColumn('number', 'Energy Level');

data.addRows([
  [{
    v: [8, 0, 0],
    f: '8 am'
  }, 1, .25],
  [{
    v: [9, 0, 0],
    f: '9 am'
  }, 2, .5],
  [{
    v: [10, 0, 0],
    f: '10 am'
  }, 3, 1],
  [{
    v: [11, 0, 0],
    f: '11 am'
  }, 4, 2.25],
  [{
    v: [12, 0, 0],
    f: '12 pm'
  }, 5, 2.25],
  [{
    v: [13, 0, 0],
    f: '1 pm'
  }, 6, 3],
  [{
    v: [14, 0, 0],
    f: '2 pm'
  }, 7, 4],
  [{
    v: [15, 0, 0],
    f: '3 pm'
  }, 8, 5.25],
  [{
    v: [16, 0, 0],
    f: '4 pm'
  }, 9, 7.5],
  [{
    v: [17, 0, 0],
    f: '5 pm'
  }, 10, 10],
]);

var options = {
  title: 'Motivation and Energy Level Throughout the Day',
  colors: ['#9575cd', '#33ac71'],
  hAxis: {
    title: 'Time of Day',
    format: 'h:mm a',
    viewWindow: {
      min: [7, 30, 0],
      max: [17, 30, 0]
    }
  },
  vAxis: {
    title: 'Rating (scale of 1-10)'
  }
};

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
chart.draw(data, options);
}
</script>
<div id="chart_div"></div>
{{-- -------------------- --}}
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Year', 'Visitations', { role: 'style' } ],
        ['2010', 10, 'color: gray'],
        ['2020', 14, 'color: #76A7FA'],
        ['2030', 16, 'opacity: 0.2'],
        ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #eb5489; fill-opacity: 0.2']
      ])

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 1000,
        height: 800,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchar_values"));
      chart.draw(view, options);
  }
  </script>
  <div id="columnchar_values" style=""></div>
  {{-- ------------------------ --}}
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_dv'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_dv" style="width: 100%; height: 500px;"></div>
  </body>
</html
>
{{-- ---------------------------------------- --}}
<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Memory', 80],
          ['CPU', 55],
          ['Network', 68]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('cha_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>
  </head>
  <body>
    <div id="cha_div" style="width: 400px; height: 120px;"></div>
  </body>
</html>

