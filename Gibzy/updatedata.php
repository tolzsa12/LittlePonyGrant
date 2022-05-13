
<?php 

    //session_start();
    //require('dbconnect.php');

?>



<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Staff information</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style_manager_staff_insert.css">
    <script src="https://kit.fontawesome.com/10654f14f2.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>


<body>

    <?php 
        require('dbconnect.php');

        $Staff_ID = $_GET["Staff_ID"];
        
        //echo $Staff_ID;

        $query = "SELECT * FROM staff_information WHERE Staff_ID = $Staff_ID";

        $result = mysqli_query($con,$query) or die("Error : $query".mysqli_error($query));

        $row = mysqli_fetch_array($result);
    ?>
<header class="header" id="navigation-menu">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a href="#" class="logo"> <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/logo.png?v=1650902529482" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        <a class="nav-link active h5 ms-5 me-4" aria-current="page" href="#">Upload Data Staff</a>
                        <a class="nav-link h5 me-4" href="#">Promotion</a>
                        <a class="nav-link h5 me-4" href="dashboard.php">Dashboard</a>
                        <a class="nav-link h5 me-4" href="ManagerStaff.php">Staff</a>

                    </div>
                    <div class="navbar-right ms-auto">
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>   
     
    <section>
        <div class="imgBx">
            <section class="copy">
                <img src="https://cdn.glitch.global/f2207cfd-db48-4054-a818-6fd8a14d4988/home1.png?v=1650902536365" alt="">
            </section>
        </div>

        <div class="contentBx">
            <div class="formBx">
                <h1>Update staff information</h1>

                <form action="update_staff_db.php" method="post">
                <input type="hidden" value = <?php echo $row['Staff_ID']; ?> name = Staff_ID>

                    <?php 
                            if(isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['warning'])) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php
                                        echo $_SESSION['warning'];
                                        unset($_SESSION['warning']);
                                    ?>
                                </div>
                            <?php } 
                        ?>

                    <div class="row">
                        <div class="inputBx">
                            <label for="firstname_staff">Firstname</label>
                            <input type="text" name="Firstname" placeholder="First name" require value = "<?php echo $row['Firstname']; ?>">
                        </div>
                        <div class="inputBx">
                            <label for="lastname_staff">Lastname</label>
                            <input type="text" name="Lastname" placeholder="Last name" require value = "<?php echo $row['Lastname']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputBx">
                            <p>Gender</p>
                            <div class="row-gender" require>
                                <input id="male" type="radio" name="Gender" value="M" <?php if($row['Gender']=="M") {echo "checked";} ?>>Male</input>
                                <input id="female" type="radio" name="Gender"value="F"<?php if($row['Gender']=="F") {echo "checked";} ?>>Female</input>
                            </div>
                        </div>
                        <div class="inputBx">
                            <p>Marital Status</p>
                            <div class="row-status" require>
                                <input id="single" type="radio" name="MaritalStatus" value="Single"<?php if($row['MaritalStatus']=="Single") {echo "checked";} ?>>Single</input>
                                <input id="married" type="radio" name="MaritalStatus" value="Married"<?php if($row['MaritalStatus']=="Married") {echo "checked";} ?>>Married</input>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="inputBx">
                            <label for="nationality_staff">Nationality</label>
                            <input class="nationality_staff" type="text" name="Nationality" placeholder="Nationality" require value = "<?php echo $row['Nationality']; ?>">
                        </div>
                        <div class="inputBx">
                            <label for="religion_staff">Religion</label>
                            <input class="religion_staff" type="text" name="Religion" placeholder="Religion" require value = "<?php echo $row['Religion']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputBx">
                            <label for="DOB_staff">Date of birth</label>
                            <input class="DOB_staff" type="date" name="DOB" require value = "<?php echo $row['DOB']; ?>">
                        </div>
                        <div class="inputBx">
                            <label for="phone_staff">Phone Number</label>
                            <input class="phone_staff" type="text" name="Staff_Phone" placeholder="Phone number" require value = "<?php echo $row['Staff_Phone']; ?>">
                        </div>
                    </div>
                    <div class="inputBx">
                        <label for="address_staff">Address</label>
                        <input calss="address" type="text" name="Address_staff" placeholder="Your address" require value = "<?php echo $row['Address_staff']; ?>">
                    </div>
                    <div class="inputBx">
                        <label for="email_staff">Email</label>
                        <input calss="email" type="email" name="Email" placeholder="Email" require value = "<?php echo $row['Email']; ?>">
                    </div>
                    <div class="inputBx">
                        <label for="password_3">Password</label>
                        <input type="password" name="Password_staff" placeholder="Password" require value = "<?php echo $row['Firstname']; ?>">
                    </div>
                    <div class="inputBx">
                        <label class="title-position_staff" for="position_staff">Position</label>
                        <select class="form-control" id="position_staff" name="PositionID" placeholder="Position" required>
                            <option selected value="P001" <?php if($row['PositionID']=="P001") {echo "SELECTED";} ?>>Manager</option>
                            <option selected value="P002" <?php if($row['PositionID']=="P002") {echo "SELECTED";} ?>>Admin</option>
                            <option selected value="P003" <?php if($row['PositionID']=="P003") {echo "SELECTED";} ?>>Cleaning</option>
                            <option selected value="P004" <?php if($row['PositionID']=="P004") {echo "SELECTED";} ?>>Service</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="inputBx">
                        <label class="title-workstation" for="workstation">Workstation</label>
                        <select class="form-control" id="workstation" name="WorkStationID" placeholder="WorkStationID" required>
                            <option selected value="FL101"<?php if($row['WorkStationID']=="FL101") {echo "SELECTED";} ?>>Room zone 1 Floor</option>
                            <option selected value="FL102"<?php if($row['WorkStationID']=="FL102") {echo "SELECTED";} ?>>Room zone 2 Floor</option>
                            <option selected value="FL103"<?php if($row['WorkStationID']=="FL103") {echo "SELECTED";} ?>>Room zone 3 Floor</option>
                            <option selected value="FL104"<?php if($row['WorkStationID']=="FL104") {echo "SELECTED";} ?>>Room zone 4 Floor</option>
                            <option selected value="FL105"<?php if($row['WorkStationID']=="FL105") {echo "SELECTED";} ?>>Room zone 5 Floor</option>
                            <option selected value="FL201"<?php if($row['WorkStationID']=="FL201") {echo "SELECTED";} ?>>Restaurant zone 1 Floor</option>
                            <option selected value="FL202"<?php if($row['WorkStationID']=="FL202") {echo "SELECTED";} ?>>Restaurant zone 2 Floor</option>
                            <option selected value="FL301"<?php if($row['WorkStationID']=="FL301") {echo "SELECTED";} ?>>Boat</option>
                            <option selected value="FL302"<?php if($row['WorkStationID']=="FL302") {echo "SELECTED";} ?>>Spa</option>
                            <option selected value="FL303"<?php if($row['WorkStationID']=="FL303") {echo "SELECTED";} ?>>Car</option>
                            <option selected value="FL555"<?php if($row['WorkStationID']=="FL555") {echo "SELECTED";} ?>>Lobby</option>
                            <option selected value="FL999"<?php if($row['WorkStationID']=="FL999") {echo "SELECTED";} ?>>Office</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="inputBx">
                            <label for="salary_staff">Salary</label>
                            <input class="salary_staff" type="number" name="Salary" placeholder="Salary" require value = "<?php echo $row['Salary']; ?>">
                        </div>
                        <div class="inputBx">
                            <label for="start_work_date_staff">Start work date</label>
                            <input class="start_work_date_staff" type="date" name="StartWorkDate" require value = "<?php echo $row['StartWorkDate']; ?>">
                        </div>
                    </div>
                    <div class="inputBx">
                        <label class="title-brance-hotel" for="room_type">Brance Hotel</label>
                        <select class="form-control" id="BranceHotel_ID" name="BranchHotel_ID" placeholder="Branch hotel" required >
                            <option selected value="BR01" <?php if($row['WorkStationID']=="BR01") {echo "SELECTED";} ?>>The GRANT Luxury Hotels Krabi</option>
                            <option selected value="BR02" <?php if($row['WorkStationID']=="BR02") {echo "SELECTED";} ?>>The GRANT Luxury Hotels Satun</option>
                            <option selected value="BR03" <?php if($row['WorkStationID']=="BR03") {echo "SELECTED";} ?>>The GRANT Luxury Hotels Prachuap Khiri Khan</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>


                    <div class="inputBx">
                        <input type="submit" name="upload_staff" value="Update staff information">
                    </div>
                </form>
            </div>
        </div>
    </section>