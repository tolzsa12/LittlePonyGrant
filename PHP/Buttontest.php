<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in Page </title>

    <link rel="stylesheet" href="StyleButtonTest.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>
<!--isset = check variable declared?, null?-->
<body>
  <form method = "post" action="">
<?php
  require('connecta4_grant.php');
  $roomnumber = 'DE0001';
  $sql = "
  SELECT Status_Booking_ID
  FROM list_booking
  WHERE Booking_ID ='$roomnumber';";
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $QueryResult = mysqli_fetch_array($objQuery);
  /*
  echo "Status Booking: " .$QueryResult['Status_Booking_ID'];
 */?>

 <button type="submit" name="Change_Status" value="change" 
 class = "button status-<?php echo $QueryResult['Status_Booking_ID'];?>">
 01</button>
 <button type="submit" name="Change_Status" value="not_change"
 class = "button status-<?php echo $QueryResult['Status_Booking_ID'];?>">
 Change Status</button>
  <?php
    if(isset($_POST["Change_Status"])&& ($_POST["Change_Status"]=="change") )
     {
       if($QueryResult['Status_Booking_ID']=="200")
       {
          $update = "
          UPDATE list_booking
          SET Status_Booking_ID ='202' 
          WHERE Booking_ID = '$roomnumber';";
          $Try = mysqli_query($conn, $update);
       }
       elseif($QueryResult['Status_Booking_ID']=="202")
       {
          $update = "
          UPDATE list_booking
          SET Status_Booking_ID ='222' 
          WHERE Booking_ID = '$roomnumber';";
          $Try = mysqli_query($conn, $update); 
       }
       elseif($QueryResult['Status_Booking_ID']=="222")
       {
           $update = "
          UPDATE list_booking
          SET Status_Booking_ID ='200' 
          WHERE Booking_ID = '$roomnumber';";
          $Try = mysqli_query($conn, $update);
       }
     }
     elseif(isset($_POST["Change_Status"])&& ($_POST["Change_Status"]=="not_change") )
    {
      echo "HELLO";
    }
  ?>
</form>
 
  <?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  echo "<br><br>";
  echo "--- END ---";
  //intval => return int value
  ?>
  <!--<form action="" method="POST">
    <input type="submit" value="0" name="mybutton">
    <input type="submit" value="1" name="mybutton">
    <input type="submit" value="2" name="mybutton">
</form>

<?php 
   //if (isset($_POST["mybutton"]))
   {
      // echo $_POST["mybutton"];
   }
?>-->
</body>


