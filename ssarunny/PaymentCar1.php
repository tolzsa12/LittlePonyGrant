<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Car</title>

    <link rel="stylesheet" href="StylePaymentCar1.css">

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

<!--book_detail-->
<div class="book_detail">
  
    <!--separate left and right-->
    <div class="row"><!--for flexing-->
        <!--coloum1-->
        <div class="column">
            <br><div
               class="boat"><img width="500" height="400" src = "https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/4.png?v=1651133090989">

            <!--------Reservation-------->
            </div>
            <ul class="input">
                <div class="main_box">
                    <h4>Car Reservation</h4>
                    <div class="box input-box flex_room">
                        <div class="left">
                            <div class="inputBx">
                                <label for="room_type">Boat Type</label>
                                <select class="form-control" id="boat_type" data-error="Select Boat Type" required>
                                    <option selected disabled>Select Boat Type</option>
                                    <option selected value="<?php echo $get_booking_type_id; ?>"><?php echo $get_booking_type; ?></option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="inputBx">
                                <label for="Boat_no">Boat No.</label>
                                <select class="form-control" id="boat_no" onchange="fetch_price(this.value)" required data-error="Select Boat No">
                                    <option selected disabled>Select Boat No</option>
                                    <option selected value="<?php echo $get_booking_id; ?>"><?php echo $get_booking_no; ?></option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="inputBx">
                                <label for="check-in">Check-in Date:</label>
                                <input type="date" placeholder="Check-in-Date" id="check_in_date" data-error="Select Check In Date" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="inputBx">
                                <label for="check-out">Check-out Date:</label>
                                <input type="date" placeholder="Check-out-Date" id="check_out_date" data-error="Select Check Out Date" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="inputBx">
                                <label for="number_guest">Number guest</label>
                                <input id="number_guest" type="number" name="number_guest" placeholder="Guest name" require>
                            </div>
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
                    <h2><br>Total price</h2><br>
                    <p>Total includes tax recovery charges and service fees.</p>
                    <p>Full payment will be charged to your credit card when you book this hotel.</p>
                </div>
            </ul>
        </div>
        <!-------------------------->   
        <!--column2-->
        <div class="column">
            <h2><br>The GRANT Luxury Hotels Krabi </h2>
                <div class = "detail_in_col2">
                    <div class = "row_in_col2">
                        <div class="column_in_col2">
                            <div class="col2_left">
                                <ul type="disc">
                                <li>Hotel Address : 277 หมู่ที่ 5 Muang Pattaya, Bang Lamung District ,Mueang Krabi</li>
                                    <li>City : Krabi</li>
                                    <li>Email : thegrantluxuryhotels.kb@gmail.com</li>
                                    <li>Postcode : 81120</li>
                                    <li>Hotel Phone : 02-305-611</li>
                                    <!--<li>● ตาข่ายบริเวณหน้าเรือ</li>-->
                                    <br>
                                </ul>  
                            </div>
                        </div>
                    </div>
                </div>
               
                
                <div class = "Service_Staff">
                    <h2 style="text-align: center;">Service Staff</h2>
                    <div class = "row_in_col2">
                        <div class="column_in_col2">
                        <img src="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/ton.png?v=1651139278027" alt="cotton">
                            <div class="description" style="float:right"> 
                                <td style="text-align: center;">
                                    สมปอง สองยาม<br>
                                    Rating <br>                                                                  
                                    ประสบการณ์ : 1 ปี<br>
                                    อายุ : 25 ปี <br>                                                                                                          
                                </td>
                            </div>
                        </div>
                        
                        <div class="column_in_col2"> 
                           <img src="https://cdn.glitch.global/20d88a4d-76b7-4f07-8460-6520f9d43535/gib.png?v=1651139278026" alt="gib">  
                           <div class="description" style="float:right"> 
                            <td style="text-align: center;">
                                ณัฐนิช หนูขวัญ<br>
                                Rating <br>                                                                  
                                ประสบการณ์ : 3 ปี<br>
                                อายุ : 35 ปี <br>                                                                                                                   
                            </td>
                            </div> 
                        </div>        
                    </div>
                    <div class = "Information_booking">
                        <table style="width: 80%;" >
                            <tr>
                                <td>Information Booking</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td ><br>Check in:   Sat 28 Jan 2023 <br><br>
                                    Check out:   Mon  06 Feb 2023<br><br>
                                    For:   2 Days<br><br> 
                                    Service Staff : ณัฐนิช หนูชวัญ<br><br></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    Car Type : SUV <br>                                                                       
                                    Tax and fee:    <br>                                                                                  
                                    Special discount GoLocal<br>                                                                                                                   
                                </td>
                                <td>
                                    THB 4,000.00<br>
                                    THB 228.48<br>
                                    -<br>
                                </td>
                            </tr>
                        </table>
                        <h2>THB 4,228,48</h2>
                        </div>
                </div>
         </div>
    </div>
</div>
<div class="end_line"></div>
<!---Payment and Confirmation--->
<div class="Payment_method">
    <h2>Payment and Confirmation</h2>
        <div class="Payment_Box">
            <div class="inputBx">
                <label for="type_payment_method">Type payment</label>
                <select class="form-control" id="id_card_id" data-error="Select ID Card Type" required onchange="validId(this.value);">
                    <option selected disabled>Select ID Card Type</option>

                </select>
            </div>
            <div class="inputBx">
                <label for="card_number">Card number</label>
                <input id="card_number" type="text" name="card_number" placeholder="Card number" require>
            </div>
            
            <div class="button_room">
                    <div class="booking">
                        <input type="submit" value="Finish Booking">
                    </div>
                    <div class="add_to_card">
                        <input type="submit" value="ADD TO CARD">
                    </div>
                </div>
        </div>    
</div>

