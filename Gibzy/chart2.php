
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
        Chart showing stacked horizontal bars. This type of visualization is
        great for comparing data that accumulates up to a sum.
    </p>-->
</figure>
<?php 
        require('dbconnect.php');

        $query = "SELECT DISTINCT partial_reference_number.Booking_ID ,list_promotion.PromotionPrice,
        type_booking.Partial_Type_Booking_ID,partial_reference_number.CheckInDateTime,type_booking.Partial_Type_Booking_Name,
        list_booking.Partial_Type_Booking_ID,SUM(list_promotion.PromotionPrice) AS Price 
        FROM partial_reference_number ,list_promotion,type_booking,list_booking 
        WHERE list_booking.Partial_Type_Booking_ID = type_booking.Partial_Type_Booking_ID 
        AND partial_reference_number.Booking_ID = list_promotion.Booking_ID 
        AND CheckInDateTime>=list_promotion.StartPromotion AND CheckInDateTime <= list_promotion.DuedatePromotion 
        AND partial_reference_number.Booking_ID = list_booking.Booking_ID GROUP BY type_booking.Partial_Type_Booking_ID";
        
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
        type: 'bar'
    },
    title: {
        text: 'Hotel Revenue'
    },
    xAxis: {
        categories: [<?php echo "'" .implode("','",$mount)."'"; ?>]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Baht'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
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
