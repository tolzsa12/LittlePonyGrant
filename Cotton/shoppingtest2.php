<?php

    session_start();
    require('connecta4_grant.php');// เข้าถึงตัวแปรหรือ method ต่างๆ ผ่าน $db_handle
    if(isset($_POST["add_to_cart"]))
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
                        echo '<script>window.location="shoppingtest2.php"</script>';

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
    <title>Shopping Cart</title>

    <link rel="stylesheet" href ="Styleshoppingcart.css">
</head>
<body>
    <div id="shopping-cart">
        <div id="txt-heading">Shopping Cart</div>
        <a href="shoppingtest2.php?action=empty">Empty Cart</a>
        <a href="payment2.php">Return to Booking page</a>
        <table class="tbl-cart" cellpadding="10" cellspacing= "1">
            <tbody>
                <tr>
                    <th style = "text-align: left"  width = "5%">Picture</th>
                    <th style = "text-align: left"  width = "10%">Booking_Name</th>
                    <th style = "text-align: left" width ="25%">Description</th>
                    <th style = "text-align: center" width = "10%">Check-in Date</th>
                    <th style = "text-align: center" width = "10%">Check-out Date</th>
                    <th style = "text-align: right;" width="5%">Quantity</th>
                    <th style = "text-align: right;" width="10%">Unit Price</th>
                    <th style = "text-align: right;" width="10%">Unit tax</th>
                    <th style = "text-align: right;" width="10%">Price</th>
                    <th style = "text-align: left;" width="5%">Remove</th>
                </tr>   
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
                <tr>
                        <td style = "text-align: left"  width = "5%"><img src="<?php echo $Picture; ?>" width = "50px" >
                        <td style = "text-align: left"  width = "10%"><?php echo $Booking_Name .$values["item_name"]; ?></td>
                        <th style = "text-align: left" width ="25%"><?php echo $Description;?></th>
                        <td style = "text-align: center" width = "10%"><?php echo $values["date_checkin"];?></td>
                        <td style = "text-align: center" width = "10%"><?php echo $values["date_checkout"];?></td>
                        <td style = "text-align: right;" width="5%"><?php echo $values["item_quantity"];?></td>
                        <td style = "text-align: right;" width="10%">$ <?php echo $values["item_price"];?></td>
                        <td style = "text-align: right;" width="10%">$ <?php echo $values["item_tax"];?></td>
                        <td style = "text-align: right;" width="10%"><?php echo number_format($values["item_quantity"]*($values["item_price"]+$values["item_tax"]),2);?></td>
                        <td style = "text-align: left;" width="5%"><a href="shoppingtest2.php?action=delete&Booking_ID=<?php echo $values["item_id"];?>"><span class="text-danger">Remove</span></a>

                </tr>
                <?php
                        $totalnet = $totalnet+ ($values["item_quantity"]*$values["item_price"]);
                        $totaltax = $totaltax+$values["item_tax"];
                        $totalall = $totalnet + $totaltax;
                    
                    }
                    ?>
                <tr>
                    <td colspan = "2" align="right">Total net</td>
                    <td align="right">$ <?php echo number_format($totalnet, 2); ?></td>
                    <td colspan = "2" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($totalall, 2); ?></td>
                    <form name="go_to_all_booking" action="PaymentInCart.php" method="post">
                        <input type="submit" id="booking" name="booking" value="Booking">
                    </form>
                </tr>
               
               <?php
                }

                ?>
            </tbody>   
        </table>
    </div>
    <div id = "product-grid">
        <div class="txt-heading">Products</div>

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
    </div>
</body>
</html>
