<?php
if (isset($_GET['room_id'])){
    $get_room_id = $_GET['room_id'];
    $get_room_sql = "SELECT * FROM room NATURAL JOIN Partial_Type_Booking_Name WHERE Booking_ID = '$get_room_id'";
    $get_room_result = mysqli_query($connection,$get_room_sql);
    $get_room = mysqli_fetch_assoc($get_room_result);

    $get_room_type_id = $get_room['Booking_ID'];
    $get_room_type = $get_room['Partial_Type_Booking_Name'];
    $get_room_no = $get_room[''];
    $get_room_price = $get_room['PromotionPrice'];
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingCar</title>

    <link rel="stylesheet" href="StyleBookingCars.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>

  <!--------------header-------->

  <header class="header" id="navigation-menu">
    <div class="container">
        <nav>
            <a href="#" class="logo"> <img src="picUI/logo.png" alt=""> </a>

            <ul class="nav-menu">
                <li> <a href="#home" class="nav-link">HOME</a> </li>
                <li> <a href="#about" class="nav-link">ABOUT</a> </li>
                <li> <a href="#service" class="nav-link">SERVICE</a> </li>
                <li> <a href="#restaurant" class="nav-link">RESTAURANT</a> </li>
                <li> <a href="#gallery" class="nav-link">GALLERY</a> </li>
                <li> <a href="#contact" class="nav-link">CONTACT</a> </li>
            </ul>
            <div class="cart"><img width="auto" height="50" src="picUI/รถเข็ญ.png" class="attachment-full size-full"
                alt="hotel logo" loading="lazy" srcset="picUI/รถเข็ญ.png 366w"
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
<section class="home" id="home">
    <div class="head_container">
      <div class="image">
        <img src="picUI/banner.jpg" class="slide">
      </div>
    </div>
</section>

<section class="book">
    <div class="container flex">
      
        <div class="input grid">
            <div class="box">
                <label>From</label>
                <input type="date" placeholder="Check-in-Date">
              </div>
              <div class="box">
                <label>Untill</label>
                <input type="date" placeholder="Check-out-Date">
              </div>
       

      </div>
      <div class="search">
        <input type="submit" value="SEARCH">
      </div>
    </div>
  </section>

  <!--------------book-------->
<!--------------list room-------->

<div class="content mtop">

            <!--------list room 1-------->
    <div class="main_box">
        <h2>Mazda CX-30 2.0 C </h2>
        <div class="box flex_room">
            <div class="left">
                <img src="https://crdms.images.consumerreports.org/c_lfill,w_720,q_auto,f_auto/prod/cars/cr/model-years/10159-2020-mazda-cx-30" alt="car1">
            </div>
            <div class="right grid2 ">
                <div class="right1">
                    <h3 class="head_info">Car Information</h>
                    <ul class="nav_list">
                        <li class="list">
                            <a class="view"> <img src="picture/view.png" alt=""> </a>
                            <p>Mazda
                                 </p>
                        </li>
                        <li class="list">
                            <a class="view"> <img src="picture/size.png" alt=""> </a>
                            <p>6AT automatic transmission (SkyAtctiv-Drive)</p>
                        </li>
                        <li class="list">
                            <a class="shower"> <img src="picture/bathtub.png" alt=""> </a>
                            <p> 4 seats</p>
                        </li>
                        <li class="list">
                            <a class="bed"> <img src="picture/bed.png" alt=""> </a>
                            <p>electrical system</p>
                        </li>
                        <li class="list">
                            <a class="member"> <img src="picture/member.png" alt=""> </a>
                            <p>Check 5</p>
                        </li>
                    </ul>
                </div>
                <div class="right2">
                    <ul class="nav_list">
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

                <div class="price">
                    <!--p class="std_price">THB 8,000.00--</p>-->
                    <h3 class="pro_price">THB 2,000.00</h3>
                </div>

                <div class="button_room">
                    <div class="booking">
                        <input type="submit" value="BOOKING">
                    </div>
                    <div class="add_to_card">
                        <input type="submit" value="ADD TO CARD">
                    </div>
                </div>

            </div>
        </div>
        <div class="end_line"></div>
    </div>


            <!--------list room 2-------->
    <div class="main_box">
        <h2>Sabaru XV 2.0i-P EyeSight</h2>
        <div class="box flex_room">
            <div class="left">
                <img src="https://www.checkraka.com/uploaded/gallery/cd/cdbfdd41c88aa5ee1dbbf70dddc5e1e2.jpg" alt="car2">
            </div>
            <div class="right grid2 ">
                <div class="right1">
                    <h3 class="head_info">Car Information</h3>
                    <ul class="nav_list">
                        <li class="list">
                            <a class="view"> <img src="picture/view.png" alt=""> </a>
                            <p>View : beach</p>
                        </li>
                        <li class="list">
                            <a class="view"> <img src="picture/size.png" alt=""> </a>
                            <p>45 square meter</p>
                        </li>
                        <li class="list">
                            <a class="shower"> <img src="picture/bathtub.png" alt=""> </a>
                            <p>Shower & Bathtub</p>
                        </li>
                        <li class="list">
                            <a class="bed"> <img src="picture/bed.png" alt=""> </a>
                            <p>1 Super King size</p>
                        </li>
                        <li class="list">
                            <a class="member"> <img src="picture/member.png" alt=""> </a>
                            <p>Max : 2 Adults</p>
                        </li>
                    </ul>
                </div>
                <div class="right2">
                    <ul class="nav_list">
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

                <div class="price">
                    <h3 class="pro_price">THB 1,500.00</h3>
                </div>

                <div class="button_room">
                    <div class="booking">
                        <input type="submit" value="BOOKING">
                    </div>
                    <div class="add_to_card">
                        <input type="submit" value="ADD TO CARD">
                    </div>
                </div>

            </div>
        </div>
        <div class="end_line"></div>
    </div>


            <!--------list room 3-------->
            <div class="main_box">
        <h2>DFSK GLORY560 Super Family SUV7 i-AUTO</h2>
        <div class="box flex_room">
            <div class="left">
                <img src="https://www.checkraka.com/uploaded/gallery/86/8673b599f7a698ff9acb0ba0c6fe6a5d.png" alt="car3">
            </div>
            <div class="right grid2 ">
                <div class="right1">
                    <h3 class="head_info">Car Information</h3>
                    
                    <ul class="nav_list">
                        <li class="list">
                            <a class="view"> <img src="picture/view.png" alt=""> </a>
                            <p>View : beach</p>
                        </li>
                        <li class="list">
                            <a class="view"> <img src="picture/size.png" alt=""> </a>
                            <p>45 square meter</p>
                        </li>
                        <li class="list">
                            <a class="shower"> <img src="picture/bathtub.png" alt=""> </a>
                            <p>Shower & Bathtub</p>
                        </li>
                        <li class="list">
                            <a class="bed"> <img src="picture/bed.png" alt=""> </a>
                            <p>1 Super King size</p>
                        </li>
                        <li class="list">
                            <a class="member"> <img src="picture/member.png" alt=""> </a>
                            <p>Max : 2 Adults</p>
                        </li>
                    </ul>
                </div>
                <div class="right2">
                    <ul class="nav_list">
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

                <div class="price">
                    <h3 class="pro_price">THB 3,000.00</h3>
                </div>

                <div class="button_room">
                    <div class="booking">
                        <input type="submit" value="BOOKING">
                    </div>
                    <div class="add_to_card">
                        <input type="submit" value="ADD TO CARD">
                    </div>
                </div>

            </div>
        </div>
        <div class="end_line"></div>
    </div>

        
    </div>


</div>