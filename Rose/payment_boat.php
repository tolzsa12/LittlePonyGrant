<?php
    session_start();
    require_once 'config/db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="StylePayment_Boat.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="mainJS.js"></script>
    

    <script type="text/javascript">
    
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
        var days = Math.floor((time / 86400000)+1);
        var total_price = days*price2;
        var y = parseInt(total_price,10);
        var tax = parseInt(y*0.07);
        var z = y+tax;
        document.getElementById("staying_day").innerHTML=days;    
        document.getElementById("total_price").innerHTML=y;   
        document.getElementById("final_price").innerHTML=z;   
        document.getElementById("TaxandFee").innerHTML=tax;  

        document.getElementById("final_price1").value=z;   
        document.getElementById("TaxandFee1").value=tax;  
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
        <?php if (isset($_SESSION['user_login'])) : ?>
            <h5>Welcome <strong><?php echo $_SESSION['FullName_user']; ?></strong></h5>
        <?php endif ?>
        <!--separate left and right-->
        <div class="row"><!--for flexing-->
            <!--coloum1-->
            <div class="content mtop">
                
                <!--------list room 1.001-------->
            <ul class="items">
                <li class="main_box" data-category="" data-price="">

                    <div class="box flex_room">
                        <div class="left">
                            <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/Group%2017.png?v=1652256716328" alt="">
                        </div>
                        <div class="right grid2 ">
                            <h3 class="head_info">The GRANT Luxury Hotels</h3>
                            <div class="right1 info">
                                <ul class="nav_list">
                                    <li class="list">
                                        <p>Hotel Address : 277 หมู่ที่ 5 Muang Pattaya, Bang Lamung District ,Mueang Krabi</p>
                                    </li>
                                    <li class="list">
                                        <p>City : Krabi</p>
                                    </li>
                                    <li class="list">
                                        <p>Email : thegrantluxuryhotels.kb@gmail.com</p>
                                    </li>
                                    <li class="list">
                                        <p>Postcode : 81120</p>
                                    </li>
                                    <li class="list">
                                        <p>Hotel Phone : 02-305-611</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul> 

            <form action="ajaxData_boat.php" method="post">

                <input type="hidden" name="final_price1"  id="final_price1" >
                <input type="hidden" name="TaxandFee1" id="TaxandFee1">
                <input type="hidden" name="UserID" id="UserID" value ="<?php echo $_SESSION['UserID']; ?> ">

                <div class="section-input">
                    <div class="part-input grid2">
                        <div class="left-part">
                            <ul class="input">
                            <div class="main_box">
                            <br><h4>Boat Reservation</h4>
                            <div class="box input-box flex_room">
                                <div class="left">
                                <div class="inputBx">
                                    <label for="type_room">Select boat :</label>
                                    <select class="type_room form-control" name="room_no" id="room_no" onchange="fetch_price(this.value)" required >
                                        <option selected disabled value="">Select boat</option>
                                        
                                        <?php
                                            $sql = mysqli_query($conn,"SELECT * FROM list_booking WHERE Partial_Type_Booking_ID = '3' ORDER BY Booking_ID");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                <option value="<?php echo $row['Booking_ID'];?>">
                                                <?php echo $row['Booking_Name'];?></option>
                                                <?php
                                            }
                                        ?>
                                        
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                    <div class="inputBx">
                                        <label for="check-in">Check-in Date:</label>
                                        <input type="date" placeholder="Check-in-Date" id="check_in_date" name="check_in_date" max="" data-error="Select Check In Date" required>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <script language="javascript">
                                        var today = new Date();
                                        var dd = String(today.getDate()).padStart(2, '0');
                                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                                        var yyyy = today.getFullYear();

                                        today = yyyy + '-' + mm + '-' + dd;
                                        $('#check_in_date').attr('min',today);
                                    </script>

                                    
                                    <div class="inputBx">
                                        <label for="check-out">Check-out Date:</label>
                                        <input type="date" placeholder="Check-out-Date" id="check_out_date" name="check_out_date" min="" data-error="Select Check Out Date" onchange="calculateDays()" required>
                                        <div class="help-block with-errors"></div>
                                    </div>


                                    <script language="javascript">
                                        var fromDate = document.getElementById("check_in_date").value;  
                                        $('#check_in_date').on('change', function(){
                                            fromDate = $(this).val();
                                            $('#check_out_date').prop('min', function(){
                                                return fromDate;
                                            })
                                        });
                                        var toDate = document.getElementById("check_out_date").value;  
                                        $('#check_out_date').on('change', function(){
                                            toDate = $(this).val();
                                            $('#check_in_date').prop('max', function(){
                                                return toDate;
                                            })
                                        });
                                        
                                    </script>


                                    <div class="inputBx">
                                        <label for="number_guest">Number guest</label>
                                        <input id="number_guest" type="number" name="MemberGuest" placeholder="Number guest" require>
                                    </div>
                                </div>
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

                        <div class="right-part">
                            <h2 class="service-staff-title" style="text-align: center;">Service Staff</h2>
                            <div class="staff-table grid2">
                                <div class="column_in_col2 grid2">
                                    <img src="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/ton.png?v=1651133846378" alt="cotton">
                                    <div class="description" style="float:right"> 
                                        <p>สมปอง สองยาม</p>
                                        <p>Rating</p>
                                        <p>ประสบการณ์ : 1 ปี</p>
                                        <p>อายุ : 25 ปี</p>
                                    </div>
                                </div>
                                
                                <div class="column_in_col2 grid2"> 
                                    <img src="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/gib.png?v=1651133845272" alt="gib">  
                                    <div class="description" style="float:right"> 
                                        <p>สมปอง สองยาม</p>
                                        <p>Rating</p>
                                        <p>ประสบการณ์ : 1 ปี</p>
                                        <p>อายุ : 25 ปี</p>
                                    </div> 
                                </div>        
                            </div>

                            <table style="width: 85%;">
                                <tr>
                                    <td><h5 class="table-info-book">Information Booking</h5></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><h6 class="total-day" style="font-weight: bold">Total Days : <span name="staying_day" id="staying_day"></span> Days</h6> </td>
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
                            
                        </div>
                    </div>
                </div>

                <div class="section-input">
                    <div class="part-input">
                        <div class="total-price grid2">
                            <div class="price-info">
                                <h3>Total price</h3>
                                <p>Total includes tax recovery charges and service fees <br>Full payment will be charged to your credit card when you book this hotel.</p>
                            </div>
                            <div class="price-show">
                                <h3 class="final_price">THB <span id="final_price" name="final_price" > 0.00 </span> </h3>
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
                                <input type="submit" id="cart" name="cart" value="Add to cart">
                                <input type="submit" id="booking" name="booking" value="Booking">
                            </div>
                        </div>    
                    </div>

                    <?php if (isset($_SESSION['user_login'])) : ?>
                            <p>Welcome <strong id="UserID" name="UserID"><?php echo $_SESSION['UserID']; ?></strong></p>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>

</body>
</html>


