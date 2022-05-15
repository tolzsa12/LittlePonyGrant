<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin1.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['admin_login']);
        header('location: signin1.php');
    }

?>


<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleCheckinPage2.css">
    <script src="https://kit.fontawesome.com/10654f14f2.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>

    <?php

        require_once 'config/db.php';
        //$query = "SELECT * FROM staff_information";
        $query = "SELECT * FROM list_promotion
        INNER JOIN list_booking ON list_booking.Booking_ID = list_promotion.Booking_ID ORDER BY PromotionID";

        $result = mysqli_query($conn,$query) or die("Error : $query".mysqli_error($query));
    ?> 

        
    <header class="header" id="navigation-menu">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a href="#" class="logo"> <img src="picture/logo.png" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        <a class="nav-link active h5 ms-5 me-4" aria-current="page" href="admin.php">Promotion</a>
                        <a class="nav-link h5 me-4" href="CheckinRoom2.php">Check Room</a>
                        <a class="nav-link h5 me-4" href="#">Booking</a>
                    </div>
                    <div class="navbar-right ms-auto">

                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    </div>
                </div>
            </nav>
        </div>
  </header>  
  
  

  <!--------------header-------->
    <!--------------book-------------->
    <!--section คือการแบ่งส่วนกัน---->
    <div class="home" id="home">
        <div class="head_container">
        <div class="image">
            <img src="picture/home1.png" class="slide">
        </div>
        </div>
    </div>



    <section class="book">
        <div class="container flex">
        
            <div class="input">
                <div class="box">
                    Date <input type="datetime-local" name="DATETIME" value="<?php echo $date;?>">
                </div>
            
            </div>
            <div class="search">
                <input type="submit" name="btnPostMe1" value="SEARCH" form='form1'>
            </div>
        </div>
  </section>


  <?php
    if(isset($_POST['btnPostMe1']))
    {   
        $date = strtotime($_POST['DATETIME']);
        $newformat = date('Y-m-d H:i:s',$date);
        $_SESSION['date'] = $newformat;
        $date = $_SESSION['date'];
    }
    else{
        $date = date('Y-m-d H:i:s');
    }
    ?>

    <?php
    //Query ห้องเขียวเหลือง แดงไม่ต้อง
    $sql1 = "SELECT DISTINCT l.Booking_ID
    FROM list_booking l,partial_reference_number p
    WHERE (l.Status_Booking_ID != '202' AND l.Booking_ID = p.Booking_ID 
    AND p.CheckInDateTime <= '$date'
    AND p.CheckOutDateTime >= '$date')";//โค้ดที่่เอาไว้เรียกใช้วันที่อยู่ระหว่างเช็คอินและเช็คเอ้า
        //ต้องใช้ LIKE ตามด้วย % ตรงที่ต้องการจะบอกว่ายังมีข้อมูลต่ออีก
    $sql2 = "SELECT DISTINCT l.Booking_ID
    FROM list_booking l,partial_reference_number p 
    WHERE (l.Status_Booking_ID !='202' 
    AND (l.Booking_ID = p.Booking_ID 
    AND ('$date' < p.CheckInDateTime 
    OR '$date' > p.CheckOutDateTime)))"; //ใช้เพื่อระบุสถานะว่าง
    $sql3 = "SELECT Booking_ID
    FROM list_booking l
    WHERE NOT EXISTS(SELECT Booking_ID
    FROM partial_reference_number p 
    WHERE  l.Booking_ID = p.Booking_ID
    );
    ";

    $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objQuery2 = mysqli_query($conn, $sql2) or die("Error Query [" . $sql2 . "]");
    $objQuery3 = mysqli_query($conn, $sql3)or die("Error Query [" . $sql3 . "]");?>
    <?php //function หาสเตตัสห้องเพื่อเอาไว้ใช้เปลี่ยนสี
    $i = 0;
    $j=0;
    $statusc = "200";
    $statusnc = "222";
    while($objResult2 = mysqli_fetch_array($objQuery2))
    {
       $room_nochange_status[$j] = $objResult2['Booking_ID'];
       $sqlnew =  "UPDATE list_booking
       SET Status_Booking_ID = '" . $statusnc . "'
       WHERE Booking_ID = $room_nochange_status[$j]" ;
       $objQ = mysqli_query($conn, $sqlnew) or die("Error Query [" . $objQ . "]");
       //echo "<br>".$room_nochange_status[$j];
       $j++;

    }
    echo "<br>";
    while($objResult1 = mysqli_fetch_array($objQuery1))
     {
        $room_change_status[$i] = $objResult1['Booking_ID'];
        $sqlnew =  "
        UPDATE list_booking
        SET Status_Booking_ID = '" . $statusc . "'
        WHERE Booking_ID = $room_change_status[$i]" ;
        $objQ = mysqli_query($conn, $sqlnew) or die("Error Query [" . $objQ . "]");
        //echo "<br>".$room_change_status[$i];
        $i++;

     }
     //echo "<br>room no change";
  
    
    // echo "<br>room have not been booked<br>";
     //while ($objResult3 = mysqli_fetch_array($objQuery3))
    //{
      // echo "<br>";
       // echo $objResult3['Booking_ID'];
    //}
    function finding_status($roomnumber,$conn)
    {
        $sqlf = "
        SELECT Status_Booking_ID
        FROM list_booking
        WHERE Booking_ID ='$roomnumber';";
        $objQueryf = mysqli_query($conn, $sqlf) or die("Error Query [" . $sqlf . "]");
        $QueryResultf = mysqli_fetch_array($objQueryf);
        return $QueryResultf['Status_Booking_ID'];
    }
?>
  <form action =""method="post" id = "form2">
  <button class ="button status-<?php echo finding_status("48",$conn);?>" type="submit" name="Change_Status" value="48">01</button>
    <button class ="button status-<?php echo finding_status("49",$conn);?>" type="submit" name="Change_Status" value="49">02</button>
    <button class ="button status-<?php echo finding_status("50",$conn);?>" type="submit" name="Change_Status" value="50">D01</button>
    <button class ="button status-<?php echo finding_status("51",$conn);?>" type="submit" name="Change_Status" value="51">D02</button>
    <button class ="button status-<?php echo finding_status("54",$conn);?>" type="submit" name="Change_Status" value="54">L01</button>
    <button class ="button status-<?php echo finding_status("55",$conn);?>" type="submit" name="Change_Status" value="55">L02</button>
    <button class ="button status-<?php echo finding_status("52",$conn);?>" type="submit" name="Change_Status" value="52">S01</button>
    <button class ="button status-<?php echo finding_status("53",$conn);?>" type="submit" name="Change_Status" value="53">S02</button>
    
  <button class ="button buttonconfirm" type="submit" name="Change_Status" value="Confirm">Confirm</button>
  
  <?php 
    if(isset($_REQUEST['Change_Status']))
   { 
       $roomname = $_REQUEST['Change_Status'];
        
   }
    if(isset($roomname)&&$roomname!="Confirm")
    {
        echo "room you click is $roomname";
        $statusroom = finding_status($roomname,$conn);

       if($statusroom =="200")
       {
        $update = "
        UPDATE list_booking
        SET Status_Booking_ID ='202' 
        WHERE Booking_ID = '$roomname';";
        $Try = mysqli_query($conn, $update);
       }
       elseif($statusroom == "202")
       {
        $update = "
        UPDATE list_booking
        SET Status_Booking_ID ='222' 
        WHERE Booking_ID = '$roomname';";
        $Try = mysqli_query($conn, $update);
       }
       unset($_REQUEST['Change_Status']);

    }
?>    
  
    
</form>


<?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  //echo "<br><br>";
  //echo "--- END ---";
  //intval => return int value
  ?>
</body>