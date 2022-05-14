
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">
#container {
    height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 350px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

		</style>
	</head>
	<body>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <!--<p class="highcharts-description">
        An area chart showing a gap in the data. By default, Highcharts treats
        <code>null</code> values as missing data, and will allow for gaps in
        datasets.
    </p>-->
</figure>

<?php 
        require('dbconnect.php');

        $query = "SELECT StartDate, COUNT(StartDate) AS count_StartDate FROM user GROUP BY YEAR(StartDate), MONTH(StartDate)";
        
        $result = mysqli_query($con,$query) or die("Error : $query".mysqli_error($query));

        
        $data = array();
        $mount = array();
        //$monthname = 
        while($row = mysqli_fetch_assoc($result)){
            $mount[] = $row['StartDate'];
            //$mount[] = $monthname;
            $data[] = $row['count_StartDate'];
        }
?>

		<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'DATA USERS'
    },
    subtitle: {
        //text: '* Jane\'s banana consumption is unknown',
        align: 'right',
        verticalAlign: 'bottom'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 100,
        y: 70,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
    },
    xAxis: {
        categories: [<?php echo "'" .implode("','",$mount)."'"; ?>] //เเก้ไขโชว์เดือน
    },
    yAxis: {
        title: {
            text: 'User'
        }
    },
    plotOptions: {
        area: {
            fillOpacity: 0.5
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: '2020', //เเก้ไขโชว์ปี
        data: [<?php echo implode(",",$data);?>]
    }]
});
		</script>
	</body>
</html>
