<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TotalCart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleTotalCart.css">

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
                    <a class="nav-link active h5 ms-5 me-4" aria-current="page" href="#">Home</a>
                    <a class="nav-link h5 me-4" href="#">About</a>
                    <a class="nav-link h5 me-4" href="#">Service</a>
                    <a class="nav-link h5 me-4" href="#">Restaurant</a>
                    <a class="nav-link h5 me-4" href="#">Gallery</a>
                    <a class="nav-link h5 me-4" href="#">Contact</a>
                </div>
                <div class="navbar-right ms-auto">
                    <a href="#" class="cart"> <img src="picture/cart.png" alt=""> </a>
                    <a href="#" class="btn btn-danger">Logout</a>
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
            <a class="view"> <i class="fa-solid fa-arrow-left" alt=""></i></a>
            <h4>Cart</h4>
        </li>
    </ul>
</section>


<!--total-list-->
<section class="cart-box">
    <ul class="nav_list">

        <!-- list-box 1-->
        <li class="list-box">
            <input id="item-list" class="item-list" type="checkbox" name="item-list">
                <h4 class="head-name-list">Suite Room</h4>
                <button class="flex1">
                    <span>Delete</span>
                    
                </button>
                <div class="box flex_room">
                    <div class="left">
                        <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/1003.png?v=1650902532014" alt="">
                    </div>
                    <div class="right">
                        <div class="right1">
                            <h4 class="title-item">Room SU001</h4>
                            <p class="des-item">Suite room, size 156 square meters, consists of 2 bedroom and 2 bathroom. 1 king size bed and 1 queen size bed, can accommodate 5 adults, a bathroom with a shower and bathtub, free Wi-Fi, kitchen equipment and beverages in the room. Sea view rooms.</p>
                        </div>
                        <div class="right2 grid2">
                            <div class="info-booking">
                                <ul class="nav_list">
                                    <li class="list">
                                        <a class="check-in"> <h6>Check in</h6> </a>
                                        <p>Sat 28 Jan 2023    14:00 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="check-out"> <h6>Check out</h6> </a>
                                        <p>Mon 06 Feb 2023    14:00 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="count-room"> <h6>Room</h6> </a>
                                        <p>1</p>
                                    </li>
                                    <li class="list">
                                        <a class="number-guest"> <h6>Number of guest</h6> </a>
                                        <p>2 person</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="price">
                                <p class="std_price">THB 8,000.00</p>
                                <h3 class="pro_price">THB 6,409.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </input>
        </li>

        <!-- list-box 2-->
        <li class="list-box">
            <input id="item-list" class="item-list" type="checkbox" name="item-list">
                <h4 class="head-name-list">Chataeu</h4>
                <button class="flex1">
                    <span>Delete</span>
                </button>

                <div class="box flex_room">
                    <div class="left">
                        <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/boat.png?v=1650902533283" alt="">
                    </div>
                    <div class="right">
                        <div class="right1">
                            <h4 class="title-item">Boat BCU101</h4>
                            <p class="des-item">The 63 ft boat can accommodate 35 customers.Diving, photography, and fishing services are available. Price includes soft drink , fruit , snorkeling equipment,
                            </p>
                        </div>
                        <div class="right2 grid2">
                            <div class="info-booking">
                                <ul class="nav_list">
                                    <li class="list">
                                        <a class="check-in"> <h6>Check in</h6> </a>
                                        <p>Sat 28 Jan 2023</p>
                                    </li>
                                    <li class="list">
                                        <a class="number-guest"> <h6>Number of guest</h6> </a>
                                        <p>2 person</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="price">
                                <p class="std_price">THB 25,000.00</p>
                                <h3 class="pro_price">THB 20,500.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </input>
        </li>

        <!-- list-box 3-->
        <li class="list-box">
            <input id="item-list" class="item-list" type="checkbox" name="item-list">
                <h4 class="head-name-list">Sabaru XV 2.0i-P EyeSight</h4>
                <button class="flex1">
                    <span>Delete</span>
                </button>

                <div class="box flex_room">
                    <div class="left">
                        <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/car.png?v=1650902533845" alt="">
                    </div>
                    <div class="right">
                        <div class="right1">
                            <h4 class="title-item">Car CS0002</h4>
                            <p class="des-item">Gear Auto CVT (Lineartronic)  4 seats  Electrical System  </p>
                        </div>
                        <div class="right2 grid2">
                            <div class="info-booking">
                                <ul class="nav_list">
                                    <li class="list">
                                        <a class="check-in"> <h6>Check in</h6> </a>
                                        <p>Sat 28 Jan 2023    14:00 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="check-out"> <h6>Check out</h6> </a>
                                        <p>Mon 06 Feb 2023    14:00 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="number-guest"> <h6>Number of guest</h6> </a>
                                        <p>2 person</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="price">
                                <p class="std_price">THB 3,500.00</p>
                                <h3 class="pro_price">THB 3,250.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </input>
        </li>

        <!-- list-box 4-->
        <li class="list-box">
            <input id="item-list" class="item-list" type="checkbox" name="item-list">
                <h4 class="head-name-list">Heavenly Relax with Hot Compress</h4>
                <button class="flex1">
                    <span>Delete</span>
                </button>

                <div class="box flex_room">
                    <div class="left">
                        <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/spa.png?v=1650902530952" alt="">
                    </div>
                    <div class="right">
                        <div class="right1">
                            <h4 class="title-item">Spa STH001</h4>
                            <p class="des-item">A value combination of Foot Reflexology (45 mins) and Thai Massage with a hot herbal compress (120 minutes). This is perfect for guests who need a full break at a Thai massage and spa location after a long day of activity, especially walking. The oil-free Thai massage helps reinvigorate the body, while foot reflexology promotes oxygenation of all body tissue, both aiming to restore your energy for the rest of the day.</p>
                        </div>
                        <div class="right2 grid2">
                            <div class="info-booking">
                                <ul class="nav_list">
                                    <li class="list">
                                        <a class="check-in"> <h6>Check in</h6> </a>
                                        <p>Sat 28 Jan 2023    14:00 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="check-out"> <h6>time</h6> </a>
                                        <p>13:30 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="number-guest"> <h6>Number of guest</h6> </a>
                                        <p>2 person</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="price">
                                <p class="std_price">THB 2,000.00</p>
                                <h3 class="pro_price">THB 1,600.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </input>
        </li>

        <!-- list-box 5-->
        <li class="list-box">
            <input id="item-list" class="item-list" type="checkbox" name="item-list">
                <h4 class="head-name-list">Yamazato Dinner 1</h4>
                <button class="flex1">
                    <span>Delete</span>
                </button>

                <div class="box flex_room">
                    <div class="left">
                        <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/food.png?v=1650902529690" alt="">
                    </div>
                    <div class="right">
                        <div class="right1">
                            <h4 class="title-item">Restaurant RYT301</h4>
                            <p class="des-item">Appetizer, soup, sashimi, grilled dish, simmered dish, rice dish, and dessert</p>
                        </div>
                        <div class="right2 grid2">
                            <div class="info-booking">
                                <ul class="nav_list">
                                    <li class="list">
                                        <a class="check-in"> <h6>Check in</h6> </a>
                                        <p>Sat 28 Jan 2023    14:00 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="check-out"> <h6>time</h6> </a>
                                        <p>13:30 pm</p>
                                    </li>
                                    <li class="list">
                                        <a class="number-guest"> <h6>Number of guest</h6> </a>
                                        <p>2 person</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="price">
                                <p class="std_price">THB 2,300.00</p>
                                <h3 class="pro_price">THB 2,000.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </input>
        </li>
    </ul>
</section>


<!--รวมราคา-->
<section class="finist-total-price">
    <div class="total-price grid2">
        <div class="price-info">
            <h3>Total price</h3>
            <p>Total includes tax recovery charges and service fees <br>Full payment will be charged to your credit card when you book this hotel.</p>
        </div>
        <div class="price-show">
            <p class="std_price">THB 3,500.00</p>
            <h3 class="pro_price">THB 3,250.00</h3>
         
                <input class ='Button_summit' type="submit" value="Finish Booking">
           
        </div>
    </div>
   
</section>

