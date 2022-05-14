<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">
.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
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
        A basic column chart compares rainfall values between four cities.
        Tokyo has the overall highest amount of rainfall, followed by New York.
        The chart is making use of the axis crosshair feature, to highlight
        months as they are hovered over.
    </p>-->
</figure>

<?php 
        require('dbconnect.php');

        $query = "SELECT DISTINCT partial_reference_number.Booking_ID ,list_promotion.PromotionPrice,type_booking.Partial_Type_Booking_ID,type_booking.Partial_Type_Booking_Name,partial_reference_number.CheckInDateTime,list_booking.Partial_Type_Booking_ID,SUM(list_promotion.PromotionPrice) AS Price FROM partial_reference_number ,list_promotion,type_booking,list_booking WHERE list_booking.Partial_Type_Booking_ID = type_booking.Partial_Type_Booking_ID AND partial_reference_number.Booking_ID = list_promotion.Booking_ID AND CheckInDateTime>=list_promotion.StartPromotion AND CheckInDateTime <= list_promotion.DuedatePromotion AND partial_reference_number.Booking_ID = list_booking.Booking_ID AND type_booking.Partial_Type_Booking_ID >4 GROUP BY type_booking.Partial_Type_Booking_ID";
        
        $result = mysqli_query($con,$query) or die("Error : $query".mysqli_error($query));

        
        $data = array();
        $mount = array();
        //$monthname = 
        while($row = mysqli_fetch_assoc($result)){
            $mount[] = $row['Partial_Type_Booking_Name'];
            //$mount[] = $monthname;
            $data[] = $row['Price'];
        }
?>


		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Rank Room Popular'
    },
    subtitle: {
        text: 'Last 1 Year'
    },
    xAxis: {
        categories: [<?php echo "'" .implode("','",$mount)."'"; ?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Baht'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: '2022',
        data: [<?php echo implode(",",$data);?>]
    }]
});
		</script>
	</body>
</html>