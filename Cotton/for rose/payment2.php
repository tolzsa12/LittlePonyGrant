<?php
    session_start();
    require_once 'connecta4_grant.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="StylePayment_Room.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

        


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="mainJS.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $(".type_room").change(function(){
            var Partial_Type_Booking_ID = $(this).val();
                $.ajax({
                    url: "ajaxData.php",
                    method: "POST",
                    data: {Partial_Type_Booking_ID: Partial_Type_Booking_ID},
                    success:function(data){
                        $('.room_no').html(data);
                    }
                });
        });
    });


    function fetch_price(val) {
        $.ajax({
            type: 'post',
            url: 'ajaxData.php',
            data: {
                Booking_ID: val,
                price: ''
            },
            success: function (response) {
                $('#price').html(response);
                var days = document.getElementById('staying_day').innerHTML;
                $('#total_price').html(response*days);
            }
            
        });
    }



    function calculateDays(price) {
        var d1 = document.getElementById("check_in_date").value; 
        var d2 = document.getElementById("check_out_date").value; 
        var price1 = document.getElementById('price').innerHTML; 
        var checkin = new Date(d1);
        var checkout = new Date(d2);
        var price2 = parseInt(price1,10);
        var time = Math.abs(checkout - checkin);
        var days = Math.floor(time / 86400000);
        var total_price = days*price2;
        var y = parseInt(total_price,10);
        var tax = parseInt(y*0.07);
        var z = y+tax;
        document.getElementById("staying_day").innerHTML=days;    
        document.getElementById("total_price").innerHTML=y;   
        document.getElementById("final_price").innerHTML=z;   
        document.getElementById("TaxandFee").innerHTML=tax;  
        $("#mydata").val(y); //store z into hidden field
        $("#mytax").val(tax);
        $("#myday").val(days);
    }    

    
    



    </script>



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
                        <a class="nav-link active h5 ms-5 me-4" aria-current="page" href="#">Home</a>
                        <a class="nav-link h5 me-4" href="#">About</a>
                        <a class="nav-link h5 me-4" href="#">Service</a>
                        <a class="nav-link h5 me-4" href="#">Restaurant</a>
                        <a class="nav-link h5 me-4" href="#">Gallery</a>
                        <a class="nav-link h5 me-4" href="#">Contact</a>
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

<!--book_detail-->
    <div class="book_detail">
        <br>
        <h5>Reference number  558785057</h5>
        <!--separate left and right-->
        <div class="row"><!--for flexing-->
            <!--coloum1-->
            <div class="content mtop">
                
                <!--------list room 1.001-------->
            <ul class="items">
                <li class="main_box" data-category="" data-price="">
                    <strong>Delux_Room</strong>
                    <div class="box flex_room">
                        <div class="left">
                            <img src="picture/1003.png" alt="">
                        </div>
                        <div class="right grid2 ">
                            <div class="right1">
                                <h3 class="head_info">Room DE001</h3>
                                <p class="info">Standard room, size 85 square meters, consists of  queen size bed, can accommodate 2 adults, a bathroom with a shower, free Wi-Fi, kitchen equipment and beverages in the room. and sea view rooms</p>
                                <ul class="nav_list">
                                    <li class="list">
                                        <a class="view"> <img src="picture/view.png" alt=""> </a>
                                        <p>View : beach</p>
                                    </li>
                                    <li class="list">
                                        <a class="view"> <img src="picture/size.png" alt=""> </a>
                                        <p>85 square meter</p>
                                    </li>
                                    <li class="list">
                                        <a class="shower"> <img src="picture/bathtub.png" alt=""> </a>
                                        <p>Shower</p>
                                    </li>
                                    <li class="list">
                                        <a class="bed"> <img src="picture/bed.png" alt=""> </a>
                                        <p>1 Queen size</p>
                                    </li>
                                    <li class="list">
                                        <a class="member"> <img src="picture/member.png" alt=""> </a>
                                        <p>Max : 2 Adults</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="right2">
                                <ul class="nav_list">
                                    <h6 class="head_service">More service</h6>
                                    <li class="list">
                                        <a class="check"> <img src="picture/check.png" alt=""> </a>
                                        <p>Breakfast</p>
                                    </li>
                                    <li class="list">
                                        <a class="check"> <img src="picture/check.png" alt=""> </a>
                                        <p>Parking</p>
                                    </li>
                                    <li class="list">
                                        <a class="check"> <img src="picture/check.png" alt=""> </a>
                                        <p>Coffee & tea</p>
                                    </li>
                                    <li class="list">
                                        <a class="check"> <img src="picture/check.png" alt=""> </a>
                                        <p>Free WIFI</p>
                                    </li>
                                    <li class="list">
                                        <a class="check"> <img src="picture/check.png" alt=""> </a>
                                        <p>Quick check-in</p>
                                    </li>
                                    <li class="list">
                                        <a class="check"> <img src="picture/check.png" alt=""> </a>
                                        <p>Fitness Center</p>
                                    </li>
                                    <li class="list">
                                        <a class="check"> <img src="picture/check.png" alt=""> </a>
                                        <p>Free water in room</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul> 

            <form action="ajaxData.php" method="post">
                <div class="section-input">
                    <div class="part-input">
                        <ul class="input">
                            <div class="main_box">
                                <h4>Room Reservation</h4>
                                <div class="box input-box flex_room">
                                    <div class="left">
                                        
                                        <div class="inputBx">
                                            <form method= "post">
                                            <label for="type_room">Type Room :</label>
                                            <select class="type_room form-control" name="type_room" id="type_room" required >
                                                <option selected disabled value="">Select Type room</option>
                                                
                                                <?php
                                                    $sql = mysqli_query($conn,"SELECT * FROM type_booking WHERE Partial_Type_Booking_ID > 4 ORDER BY Partial_Type_Booking_Name");
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        ?>
                                                        <option value="<?php echo $row['Partial_Type_Booking_ID'];?>">
                                                        <?php echo $row['Partial_Type_Booking_Name'];?></option>
                                                        <?php
                                                    }
                                                ?>
                                                
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="inputBx">
                                            <label for="room_no">Room No. :</label>
                                            <select class="room_no form-control" name="room_no" id="room_no" name="room_no" onchange="fetch_price(this.value)" required>
                                                <option selected disabled>Select Room No.</option>
                                                
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="inputBx">
                                            <label for="check-in">Check-in Date:</label>
                                            <input type="date" placeholder="mm/dd/yyyy" id="check_in_date" name="check_in_date" data-error="Select Check In Date" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="inputBx">
                                            <label for="check-out">Check-out Date:</label>
                                            <input type="date" placeholder="mm/dd/yyyy" id="check_out_date" name="check_out_date" onchange="calculateDays()" data-error="Select Check Out Date" required>
                                            <div class="help-block with-errors"></div>
                                        </div>


                                    </div>
                                    <div class="right">
                                        <div class="inputBx">
                                            <label for="number_guest">Number guest</label>
                                            <input id="MemberGuest" type="number" name="MemberGuest" placeholder="Guest name" require>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="inputBx">
                                            <label for="GuestName">Guest name</label>
                                            <input id="GuestName" type="text" name="GuestName" placeholder="Guest name" require>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="inputBx">
                                            <label for="Phone_Guest">Phone Number</label>
                                            <input id="Phone_Guest" type="text" name="Phone_Guest" placeholder="Enter phone number" require>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="inputBx">
                                            <label for="Message">Notify to hotel</label>
                                            <input id="Message" type="text" name="Message" placeholder="Enter your message" require>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>

                        <table style="width: 85%;">
                            <tr>
                                <td><h5 class="table-info-book">Information Booking</h5></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h6 class="total-day" style="font-weight: bold">Total Days : <span name="staying_day" id="staying_day"></span> Days</h6> </td>
                                <input type="hidden" name="total_day" id="myday">
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="table-price price" name="price">Price of room: <span id="price"> 0 </span> Bath</h6>                                                                    
                                    <h6 class="table-price" style="font-weight: bold">Total Amount : <span name="total_price" id="total_price"> 0 </span> Bath</h6>                                                                                                                                                                                                  
                                    <h6 class="table-price tax">Tax and fee: <span id="TaxandFee" name="TaxandFee"> 0 </span> Bath</h6>
                                </td>
                            </tr>
                        </table>

                        <div class="total-price grid2">
                            <div class="price-info">
                                <h3>Total price</h3>
                                <p>Total includes tax recovery charges and service fees <br>Full payment will be charged to your credit card when you book this hotel.</p>
                            </div>
                            <div class="price-show">
                                <h3 class="final_price">THB <span id="final_price" name="final_price"> 0.00 </span> </h3>
                                <input type="hidden" name="total_price" id="mydata">
                                <input type="hidden" name="total_tax" id="mytax">
                                <input type="hidden" name="quantity" id="mydata" value="1">
                            </div>
                        </div>
                        <div class="end_line"></div>
                    </div>

                    <div class="Payment_method">
                        <h2>Payment and Confirmation</h2>
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
                                <input id="CardNumber" type="text" name="CardNumber" placeholder="Card number" require>
                            </div>
                            <div class="Button_summit">
                                <input type="submit"  id="cart" name="add_to_cart" formaction="shoppingtest2.php" value="Add to cart">
                                <input type="submit" id="booking" name="booking" value="Booking">
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>