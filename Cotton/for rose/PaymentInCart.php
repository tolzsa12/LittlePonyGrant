<?php
    session_start();
    require('connecta4_grant.php');
    $UserID = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment In Cart</title>

    <link rel="stylesheet" href="StylePaymentInCart.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
  <!--------------header-------->
  <body itemtype='https://schema.org/Blog' itemscope='itemscope'
  class="post-template post-template-elementor_header_footer single single-post postid-118 single-format-standard wp-custom-logo ast-desktop ast-separate-container ast-right-sidebar astra-2.5.4 ast-header-custom-item-inside ast-blog-single-style-1 ast-single-post ast-inherit-site-logo-transparent ast-normal-title-enabled elementor-default elementor-template-full-width elementor-kit-192 elementor-page elementor-page-118">

  <div class="hfeed site" id="page">

<header class="header" id="navigation-menu">
    <div class="container">
        <nav>
            <a href="#" class="logo"> <img src="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/logo.png?v=1651133277443" alt=""> </a>

            <ul class="nav-menu">
                <li> <a href="#home" class="nav-link">HOME</a> </li>
                <li> <a href="#about" class="nav-link">ABOUT</a> </li>
                <li> <a href="#service" class="nav-link">SERVICE</a> </li>
                <li> <a href="#restaurant" class="nav-link">RESTAURANT</a> </li>
                <li> <a href="#gallery" class="nav-link">GALLERY</a> </li>
                <li> <a href="#contact" class="nav-link">CONTACT</a> </li>
            </ul>
            <div class="cart"><img width="auto" height="50" src="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/%E0%B8%A3%E0%B8%96%E0%B9%80%E0%B8%82%E0%B9%87%E0%B8%8D.png?v=1651133287470" class="attachment-full size-full"
                alt="hotel logo" loading="lazy" srcset="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/%E0%B8%A3%E0%B8%96%E0%B9%80%E0%B8%82%E0%B9%87%E0%B8%8D.png?v=1651133287470"
                sizes="(max-width: 500px) 200vw, 150px" /></a></div>
            
            <div class="hambuger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>
</header>

  <script>
    const hambuger = document.querySelector('.hambuger');
    const navMenu = document.querySelector('.nav-menu');

    hambuger.addEventListener("click", mobileMenu);

    function mobileMenu() {
      hambuger.classList.toggle("active");
      navMenu.classList.toggle("active");
    }

    const navLink = document.querySelectorAll('.nav-link');
    navLink.forEach((n) => n.addEventListener("click", closeMenu));

    function closeMenu() {
      hambuger.classList.remove("active");
      navMenu.classList.remove("active");
    }
  </script>

  <!--------------header-------->
<!--------------book-------------->
<!--section คือการแบ่งส่วนกัน---->
<div class="home" id="home">
    <div class="head_container">
      <div class="image">
        <img src="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/banner.jpg?v=1651133276880" class="slide">
      </div>
    </div>
</div>
<form method= "post" action = "">
<ul class="input">  
  <div class="main_box">
      <br><h4 style="text-align: center; margin-top: 15%;">Description</h4>
      <div class="box input-box_flex_room">
          <div class="right">
              <div style="margin-top: 1.2%;"class="inputBx">
                  <label for="GuestName">Guest name</label>
                  <input id="GuestName" type="text" name="GuestName" placeholder="Guest name" require>
              </div>
              <div style="margin-top: 1%;"class="inputBx">
                  <label for="Phone_Guest">Phone Number</label>
                  <input id="Phone_Guest" type="text" name="Phone_Guest" placeholder="Enter phone number" require>
              </div>
              <div style="margin-top: 2%;"class="inputBx">
                  <label for="Message">Notify to hotel</label>
                  <input id="Message" type="text" name="Message" placeholder="Enter your message" require>
              </div>
          </div>
      </div>
  </div>
</ul>
</div>
<div class="end_line"></div>
<!--for testing-->
<div>
<?php
if(isset($_POST["booking"]))
        {
            if(isset($_SESSION["shopping_cart"]))
            {
               $totalprice = 0;
               $totaltax = 0;
                foreach($_SESSION["shopping_cart"] as $keys=>$values)
                {
                     echo " ".$values["item_name"];
                     echo " ".$values["date_checkin"];
                     if($values["date_checkout"]=="")
                     {
                        $check_in_date = $values["date_checkin"];
                        $minutes_to_add = 120;
                        $time = new DateTime("$check_in_date");
                        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                        
                        $stamp = $time->format('Y-m-d H:i');
                        echo " ".$stamp;
                     }
                     else
                    {
                        $check_out = $values["date_checkout"];
                        echo "Finally ".$check_out;
                    }
                     echo " ".$values["item_quantity"];
                     echo " ".$values["item_price"];
                     echo " ".$values["item_tax"];
                     echo " ".$values["member_guest"];
                     echo " ".number_format($values["item_quantity"]*($values["item_price"]+$values["item_tax"]),2);
                     echo "<br>";
                     $totalprice = $totalprice + ($values["item_price"]+$values["item_tax"]);
                     $totaltax = $totaltax + $values["item_tax"];
                }
                echo "<br>total price is" .$totalprice;
                echo "<br>total tax is" .$totaltax;
            }
        }
else{ echo "Data not found";}
?>
</div>
<!---Payment and Confirmation--->

<div class="Payment_method">
    <h2 style="margin-top: 1%;">Payment and Confirmation</h2>
        <div class="Payment_Box">
        <div class="inputBx">
                <label for="type_payment_method">Type payment</label>
                    <select class="form-control" id="PaymentMethod_ID" name="PaymentMethod_ID" data-error="Select ID Card Type" required>
                        <option selected disabled>Select ID Card Type</option>
                                    <?php
                                        $sql = mysqli_query($conn,"SELECT * FROM payment_method ORDER BY PaymentMethod_Name");
                                        while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?php echo $row['PaymentMethod_ID'];?>">
                                            <?php echo $row['PaymentMethod_Name'];?></option>
                                            <?php
                                        }
                                    ?>

                                </select>
                            </div>
            <div class="inputBx">
                <label for="card_number">Card number</label>
                <input id="card_number" type="text" name="card_number" placeholder="Card number" require>
            </div>
            <div class="Button_summit"> 
                 <input type="submit" name = "finish_booking"value="Finish Booking">
                </form>
            </div>
        </div>    
</div>
</form>
<?php
    if(isset($_POST["finish_booking"]))
    {
        if(isset($_SESSION["shopping_cart"]))
            {
               $totalprice = 0;
               $totaltax = 0;
                foreach($_SESSION["shopping_cart"] as $keys=>$values)
                {
                    $totalprice = $totalprice + ($values["item_price"]+$values["item_tax"]);
                    $totaltax = $totaltax + $values["item_tax"];
                }
         //echo "<br>total price is" .$totalprice;
         //echo "<br>total tax is" .$totaltax;
            
        //$UserID กำหนดให้เป็น 999
        $final_price =  $totalprice;
        $PaymentMethod_ID = $_POST['PaymentMethod_ID'];
        $CardNumber = $_POST['card_number'];
        $TaxandFee = $totaltax;
        $GuestName = $_POST['GuestName'] ;
        $Phone_Guest = $_POST['Phone_Guest'];
        $Message =$_POST['Message'];
        $main_reference_number_sql = "INSERT INTO main_reference_number (UserID,PriceTotalPayment,PaymentMethod_ID,CardNumber,TaxandFee,GuestName,Phone_Guest,Message) VALUES ('$UserID','$final_price','$PaymentMethod_ID','$CardNumber','$TaxandFee','$GuestName','$Phone_Guest','$Message')";

        $main_reference_number_result = mysqli_query($conn, $main_reference_number_sql);
                
        if(isset($_POST["finish_booking"]))
        {   
            if(isset($_SESSION["shopping_cart"]))
            {
                $ReferenceNumber = mysqli_insert_id($conn);
                foreach($_SESSION["shopping_cart"] as $keys=>$values)
                {
                $room_no = $values["item_name"];
    
                $MemberGuest = $values["member_guest"];
        
                //$stamp คือเวลาเช็คอินที่มีการแปลงแล้ว
                
               // $check_in_date = $values['date_checkin'];
                //$check_out_date = $values['date_checkout'];
                if($values["date_checkout"]=="")
                     {
                        $stamp1 = $values["date_checkin"];
                        $minutes_to_add = 120;
                        $time = new DateTime("$stamp1");
                        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                        $stamp2 = $time->format('Y-m-d H:i:s');
                       // $stamp2 = $time->
                      //  echo" ".$stamp1." ".$stamp2;
                     }
                     else //Clear แล้ว
                    {
                        $check_in = $values["date_checkin"];
                        $check_out = $values["date_checkout"];
                        $minutes_to_add = 720;
                        $time = new DateTime($check_in);
                        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                        $stamp1 = $time->format('Y-m-d H:i');
                        
                        $time = new DateTime($check_out);
                        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                        $stamp2 = $time->format('Y-m-d H:i');
                       // echo "Finally ".$check_out;
                    }
               // echo "check_in_date is ".$check_in_date. " check_out_date is".$check_out_date;
                //echo "<br>";
               // $time = new DateTime($check_in_date);
               // $time->add(new DateInterval('PT' . $minutes_to_add . 'H'));
               // $stamp = $time->format('Y-m-d H:i');
                //$stamp2 คือเวลาเช็คเอ้าที่มีการแปลงแล้ว 
                //Gen referenceNumber หลังจากที่ใส่ใน main เรียบร้อยแล้ว
                $partial_reference_number_sql = "INSERT INTO partial_reference_number (Reference_PartialNumber,ReferenceNumber,Booking_ID,MemberGuest,CheckInDateTime,CheckOutDateTime,Staff_ID) VALUES ('','$ReferenceNumber','$room_no','$MemberGuest','$stamp1','$stamp2','100001')";
                $partial_reference_number_result = mysqli_query($conn, $partial_reference_number_sql);
                }
            echo '<script>alert("Already Add in the database, please Check your database")</script>';
           // echo '<script>window.location="payment2.php"</script>';
            }
             
        }

        //finalprice คืออันที่รวม tax / $taxandFee เอาจากตารางที่แล้วได้
        //Cardnumber / Guestname / message /type payment,phone guestกรอกจากหน้านี้
        //User ID เราสมมุติเอาเลย โรสเอาจากการล้อกอิน
  
}
            }

?>