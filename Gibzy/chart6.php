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

        $query = "SELECT DISTINCT partial_reference_number.Booking_ID ,list_promotion.PromotionPrice ,
        partial_reference_number.CheckInDateTime,partial_reference_number.MemberGuest,
        SUM(list_promotion.PromotionPrice) AS Price ,SUM(DISTINCT partial_reference_number.MemberGuest) 
        AS summember FROM partial_reference_number ,list_promotion 
        WHERE partial_reference_number.Booking_ID = list_promotion.Booking_ID 
        AND CheckInDateTime>=list_promotion.StartPromotion AND CheckInDateTime <= list_promotion.DuedatePromotion 
        GROUP BY MONTH(CheckInDateTime) ,YEAR(CheckInDateTime)";
        
        $result = mysqli_query($con,$query) or die("Error : $query".mysqli_error($query));

        
        $data = array();
        $mount = array();
        $data2 = array();
        //$monthname = 
        while($row = mysqli_fetch_assoc($result)){
            $mount[] = $row['CheckInDateTime'];
            //$mount[] = $monthname;
            $data[] = $row['Price'];
            $data2[] = $row['summember'];
        }
?>

		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Data User'
    },
    subtitle: {
        text: '',
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
        categories: [<?php echo "'" .implode("','",$mount)."'"; ?>]
    },
    yAxis: {
        title: {
            text: 'Y-Axis'
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
        name: 'Totle Revenue',
        data: [<?php echo implode(",",$data);?>]
    }, {
        name: 'All User',
        data: [<?php echo implode(",",$data2);?>]
    }]
});
		</script>
	</body>
</html>
