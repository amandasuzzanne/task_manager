<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASK SUMMARY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="container">
    <div class="sidenav">
      <a href="/" style="margin-top: 35px;">HOME</a>
      <a href="/manage_tasks" style="margin-top: 35px;">MANAGE TASKS</a>
      <a href="/calendar" style="margin-top: 35px;">EVENT CALENDAR</a>
      <a href="/visualization" style="color: white; margin-top: 35px;">TASK SUMMARY</a>
      <a href="/logout" style="margin-top: 270px;">LOGOUT</a>
  </div>
    <div class="main">
      <h1>TASK SUMMARY</h1>
    </div>
    <div id="piechart_3d" style="width: 1045px; height: 500px;"></div>

</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // google piechart
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    // parse php variable to javascript
    let statusTypeCount = @json($status_type_count);

    function drawChart() {
      let data = google.visualization.arrayToDataTable([
        ['Task', 'Status'],
        // unpack array values using spread operator
        ...statusTypeCount
      ]);

      let options = {
        title: 'Task Status',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
    }
</script>

</html>