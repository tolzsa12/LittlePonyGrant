<?php

    session_start();
    require_once 'config/db.php';// เข้าถึงตัวแปรหรือ method ต่างๆ ผ่าน $db_handle
    if(isset($_POST["cart"]))
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
            if(!in_array($_POST['room_no'],$item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'           => $_POST["room_no"],
                    'item_name'         => $_POST["room_no"],
                    'date_checkin'      => $_POST["check_in_date"],
                    'date_checkout'     => $_POST["check_out_date"],
                    'item_price'        => $_POST['total_price'],
                    'item_tax'          => $_POST['total_tax'],
                    'item_quantity'     => $_POST['quantity'],
                    'member_guest'      => $_POST['MemberGuest']
                );
                $_SESSION['shopping_cart'][$count] = $item_array;
                $_SESSION['countnextpage'] = $count;
            }
            else
            {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
        else 
        {
            $item_array = array(
                    'item_id'           => $_POST["room_no"],
                    'item_name'         => $_POST["room_no"],
                    'date_checkin'      => $_POST["check_in_date"],
                    'date_checkout'     => $_POST["check_out_date"],
                    'item_price'        => $_POST['total_price'],
                    'item_tax'          => $_POST['total_tax'],
                    'item_quantity'     => $_POST['quantity'],
                    'member_guest'      => $_POST['MemberGuest']

            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }
    if(isset($_GET["action"]))
    {
        if($_GET["action"]=="delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys=> $values)
            {
                    if($values["item_id"]==$_GET["Booking_ID"])
                    {
                        unset($_SESSION["shopping_cart"][$keys]);
                        echo '<script>alert("Item Removed")</script>';
                        echo '<script>window.location=Totalcart1.php"</script>';

                    }
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Boat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styletotalcart.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<script src="https://kit.fontawesome.com/10654f14f2.js" crossorigin="anonymous"></script>

</head>

<body>

    <!--------------header-------->

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
                        <a class="nav-link active h5 ms-5 me-4" aria-current="page" href="HomePage.php">Home</a>
                        <a class="nav-link h5 me-4" href="#">About</a>
                        <a class="nav-link h5 me-4" href="Service1.php">Service</a>
                        <a class="nav-link h5 me-4" href="HomeRestaurant.php"">Restaurant</a>
                        <a class="nav-link h5 me-4" href="#"">Gallery</a>
                        <a class="nav-link h5 me-4" href="#"">Contact</a>
                    </div>
                    <div class="navbar-right ms-auto">
                        <a href="#" class="cart"> <img src="picture/cart.png" alt=""> </a>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    </div>
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
    <!--exit cart-->
    <section class="exit-cart">
        <ul class="nav_list">
            <li class="list">
                <a class="view" href="HomePage.php"> <i class="fa-solid fa-arrow-left" alt=""></i></a>
                <a href="HomePage.php"><h4>Back to home</h4></a>
                
            </li>
        </ul>
    </section>

    <?php
        if(!empty($_SESSION["shopping_cart"]))
        {
            $totalnet = 0;//item price
            $totaltax = 0;
            $totalall = 0;
            foreach($_SESSION["shopping_cart"] as $keys=>$values)
            {
                $bookingid = $values['item_name'];
                $sql1 = "
                SELECT Booking_Name, Description, Picture 
                FROM list_booking
                WHERE Booking_ID = '$bookingid'
                ;
                ";
                $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
                while($objResult1 = mysqli_fetch_array($objQuery1))
                {
                    $Booking_Name = $objResult1['Booking_Name'];
                    $Picture = $objResult1['Picture'];
                    $Description= $objResult1['Description'];
                }
                ?>
                <!--total-list-->
                <section class="cart-box">
                    <ul class="nav_list">
                        <!-- list-box 1-->
                        <li class="list-box">
                            <h4 class="head-name-list"><?php echo $Booking_Name .$values["item_name"]; ?></h4>
                            <button class="flex1">
                                <a href="Totalcart1.php?action=delete&Booking_ID=<?php echo $values["item_id"];?>"><span class="text-danger">Remove</span></a>
                            </button>
                            <div class="box flex_room">
                                <div class="left">
                                    <img src="<?php echo $Picture; ?>">
                                </div>
                                <div class="right">
                                    <div class="right1">
                                        <h4 class="title-item"><?php echo $Booking_Name .$values["item_name"]; ?></h4>
                                        <p class="des-item"><?php echo $Description;?></p>
                                    </div>
                                    <div class="right2 grid2">
                                        <div class="info-booking">
                                            <ul class="nav_list">
                                                <li class="list">
                                                    <a class="check-in"> <h6>Check in</h6> </a>
                                                    <p><?php echo $values["date_checkin"];?></p>
                                                </li>
                                                <li class="list">
                                                    <a class="check-out"> <h6>Check out</h6> </a>
                                                    <p><?php echo $values["date_checkout"];?></p>
                                                </li>
                                                <li class="list">
                                                    <a class="number-guest"> <h6>Number of guest</h6> </a>
                                                    <p><?php echo $values["item_quantity"];?></p>
                                                </li>
                                                <li class="list">
                                                    <a class="price-item"> <h6>Price</h6> </a>
                                                    <p>THB <?php echo $values["item_price"];?></p>
                                                </li>
                                                <li class="list">
                                                    <a class="tax"> <h6>Taxandfee</h6> </a>
                                                    <p>THB <?php echo $values["item_tax"];?></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <p class="std_price"></p>
                                            <h3 class="pro_price">THB <?php echo number_format($values["item_quantity"]*($values["item_price"]+$values["item_tax"]),2);?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>

                <?php

                $totalnet = $totalnet+ ($values["item_quantity"]*$values["item_price"]);
                $totaltax = $totaltax+$values["item_tax"];
                $totalall = $totalnet + $totaltax;
            
            }
            ?>

            <section class="finist-total-price">
                <div class="total-price">
                    <div class="price-info">
                        <h3>Total price (no tax)</h3>
                        <p class="pricenotax">THB <?php echo number_format($totalnet, 2); ?></p>
                    </div>
                    <div class="price-info">
                        <h3>Total price</h3>
                        <p class="total_price">THB <?php echo number_format($totalall, 2); ?></p>
                    </div>
                </div>

                <form name="go_to_all_booking" action="PaymentInCart.php" method="post">
                    <input type="submit" id="booking" name="booking" value="Booking">
                </form>
            </section>
            <?php
        }
    ?>

    <?php 
        $date_today = date("Y/m/d");
        $sql = "
        SELECT b.Booking_ID,Booking_Name,TotalMember,Status_Booking_ID,PromotionPrice,Picture
        FROM list_booking b, list_promotion p
        WHERE b.Booking_ID = p.Booking_ID 
        AND ('$date_today' >= p.StartPromotion) 
        AND ('$date_today' <= p.DuedatePromotion)
        ORDER BY Booking_ID;
        "; 
        
        $product_array = mysqli_query($conn,$sql);
        if(!empty($product_array))
        {
            while($product_array_each = mysqli_fetch_array($product_array))
            {//เราต้องการ loop ในส่วนของ การแสดงผล เราเลยไปปิดด้านล่าง

                ?>

                <!-- <div class="product-item">
                    <form method = "post"action="shoppingtest2.php?action=add&Booking_ID=<?php //echo $product_array_each["Booking_ID"];?>">
                        <div class="product-image">
                            <img src="<?php //echo $product_array_each["Picture"]?>" alt="images" width = "200px">
                        </div>
                        <div class="product-title-footer">
                            <div class="producti-title"><?php //echo $product_array_each["Booking_Name"]?> </div>
                            <div class = "product-price"><?php// echo $product_array_each["PromotionPrice"]?></div>
                            
                            <div class = "cart-action">
                                <input type= "text" class = "product-quantity" name= "quantity" value="1" size = "2">
                                
                                <input type = "hidden" name = "hidden_name" value="<?php// echo $product_array_each["Booking_Name"];?>">
                                
                                <input type = "hidden" name = "hidden_price" value="<?php //echo $product_array_each["PromotionPrice"];?>">
                                <input type="submit" name = "add_to_cart" value ="Add to cart" class = "btnAddAction">
                            </div>
                        </div>
                    </form>
                </div>-->
                <?php
            }
        }
    
    ?>

</body>
</html>



