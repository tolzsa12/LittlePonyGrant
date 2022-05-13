<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleManagerStaff.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f66d23057c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@500;700&display=swap" rel="stylesheet">

    <title>Manager Staff</title>
</head>
<body>

    <?php
        include 'dbconnect.php';
        $emp_data = $_POST["emp_data"];
        //$query = "SELECT * FROM staff_information";
        $query = "SELECT *FROM staff_information 
        
        INNER JOIN position ON position.PositionID = staff_information.PositionID
        INNER JOIN workstation ON workstation.WorkStationID = staff_information.WorkStationID
        INNER JOIN data_status_for_staff ON data_status_for_staff.Status_Staff_ID = staff_information.Status_Staff_ID
        
        WHERE Firstname LIKE '%$emp_data%' OR Lastname LIKE '%$emp_data%'
        
        ORDER BY Staff_ID";

        $result = mysqli_query($con,$query) or die("Error : $query".mysqli_error($query));
        $count = mysqli_num_rows($result);
    ?>

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
        <div class="container">
        <h1 class = "title"> Staff </h1>
        <form action = "searchdata.php" class ="form-group my-3" method = "POST">
            <div class="row">
                <div class = "col-6">
                    <input type="text" placeholder="กรอกชื่อหรือนามสกุล" class = "form-control"
                    name = "emp_data" required>
                </div>
                <div class="col-6">
                    <input type="submit" value="Search" class="btn btn-info">
                </div>
            </div>
        </form>

        <?php if($count > 0) {?>
        <div class="taa">
        <table class="table" style = "width: 80%">
            <thead>
                <tr>
                <th>Staff_ID</th>
                <th>BranchHotel_ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Staff_Phone</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>E-mail</th>
                <!--<th>Password</th>-->
                <th>Nationnality</th>
                <th>Religion</th>
                <th>MaritalStatus</th>
                <th>PositionID</th>
                <th>Workstation</th>
                <th>Salary</th>
                <th>StartWorkDate</th>
                <th>EndWorkDate</th>
                <th>Status_Staff_ID</th>
                <th>Delete</th>
                <th>Edit_Data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row){ ?>
                <tr>
                    <td><?php echo $row['Staff_ID'];?></td>
                    <td><?php echo $row['BranchHotel_ID'];?></td>
                    <td><?php echo $row['Firstname'];?></td>
                    <td><?php echo $row['Lastname'];?></td>
                    <td><?php echo $row['Staff_Phone'];?></td>
                    <td><?php echo $row['Address_staff'];?></td>
                    <td><?php echo $row['DOB'];?></td>
                    <td><?php echo $row['Gender'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <!--<td><?php echo $row['Password_staff'];?></td>-->
                    <td><?php echo $row['Nationality'];?></td>
                    <td><?php echo $row['Religion'];?></td>
                    <td><?php echo $row['MaritalStatus'];?></td>
                    <td><?php echo $row['PositionName'];?></td> <!-- -->
                    <td><?php echo $row['WorkStationName'];?></td> <!-- -->
                    <td><?php echo $row['Salary'];?></td>
                    <td><?php echo $row['StartWorkDate'];?></td>
                    <td><?php echo $row['EndWorkDate'];?></td>
                    <td><?php echo $row['Status_Staff_Name'];?></td> <!-- -->
                    <td><a href = "deleteData.php?Staff_ID=<?php echo $row ["Staff_ID"] ?>" class="btn btn-danger" onclick="return confirm('Confirm Delete Data')">DELETE</a></td>
                    <td><a href="updatestaff.php?Staff_ID=<?php echo $row ["Staff_ID"] ?>" class = "btn btn-success">Edit</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
        <?php } else { ?>
            <div class="alert alert-danger">
                <b>ไม่พบข้อมูลพนักงาน</b>
            </div>
        <?php } ?>

        <a href="Managerstaff.php" class ="btn btn-success">Back to Home</a>
    </div>
</body>
</html>