<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styleDashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f66d23057c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@500;700&display=swap" rel="stylesheet">

    
</head>
<body>
    <div class="top-bar">
        <div class="front">
            <img src="img/logo.svg" alt="" class="logo">
        <div class="botton-head">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="insert_staff_db.php">Uplode Data Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">PROMOTION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">DASHBOARD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ManagerStaff.php">STAFF</a>
                </li>
            </ul>

            <!--<input type="submit" value="HOME" class="home" href = "https://www.youtube.com/watch?v=0i89HzDcaig&list=LL&index=1&t=72s">
            <input type="submit" value="ABOUT" class="about">
            <input type="submit" value="ROOM" class="room">
            <input type="submit" value="SERVICE" class="service">
            <input type="submit" value="RESTAURANT" class="restaurant">
            <input type="submit" value="GALLERY" class="gallery">
            <input type="submit" value="CONTACT" class="contact">-->
        </div>
        </div>
        <!--<ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
        </ul>-->
        <div class="navbar-right ms-auto">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="main">
        <h1 style = "text-align: center">Dashboard</h1>
        
        <iframe style = "align-items: center;" src="chartGender.php" height="500" width="500" style = "margin-left: 20px"></iframe>
        <iframe src="chart6.php" height="500" width="500" ></iframe>
        <iframe src="chart5.php" height="500" width="500" ></iframe>
        <iframe src="chart4.php" height="500" width="500" ></iframe>
        <iframe src="chart2.php" height="500" width="800" ></iframe>
        <iframe src="" frameborder="0"></iframe>
    </div>


</body>
</html>