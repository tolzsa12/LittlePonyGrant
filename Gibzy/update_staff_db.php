<?php 

    session_start();
    require('dbconnect.php');

    //$Staff_ID = $_GET['StaffID'];

    if (isset($_POST['upload_staff'])) {
        $Staff_ID = $_POST['Staff_ID'];
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Gender = $_POST['Gender'];
        $MaritalStatus = $_POST['MaritalStatus'];
        $Nationality = $_POST['Nationality'];
        $Religion = $_POST['Religion'];
        $DOB = $_POST['DOB'];
        $Staff_Phone = $_POST['Staff_Phone'];
        $Address_staff = $_POST['Address_staff'];
        $Email = $_POST['Email'];
        $Password_staff = $_POST['Password_staff'];
        $PositionID = $_POST['PositionID'];
        $WorkStationID = $_POST['WorkStationID'];
        $Salary = $_POST['Salary'];
        $StartWorkDate = $_POST['StartWorkDate'];
        $BranchHotel_ID = $_POST['BranchHotel_ID'];
       //$urole = 'user';

        if(empty($Firstname)){
            $_SESSION['error'] = 'Please input firstname';
            header("location: updatedata.php");
        } else if (empty($Lastname)){
            $_SESSION['error'] = 'Please input lastname';
            header("location: updatedata.php");
        } else if (empty($Gender)){
            $_SESSION['error'] = 'Please choose gender';
            header("location: updatedata.php");
        } else if (empty($MaritalStatus)){
            $_SESSION['error'] = 'Please choose marital status';
            header("location: updatedata.php");
        } else if (empty($Nationality)){
            $_SESSION['error'] = 'Please input nationality';
            header("location: updatedata.php");
        } else if (empty($Religion)){
            $_SESSION['error'] = 'Please input religion';
            header("location: updatedata.php");
        } else if (empty($DOB)){
            $_SESSION['error'] = 'Please choose date of birth';
            header("location: updatedata.php");
        } else if (empty($Staff_Phone)){
            $_SESSION['error'] = 'Please input phone number';
            header("location: updatedata.php");
        } else if (empty($Address_staff)){
            $_SESSION['error'] = 'Please input address';
            header("location: updatedata.php");
        } else if (empty($Email)){
            $_SESSION['error'] = 'Please input email';
            header("location: updatedata.php");
        } else if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'E-mail is not correct form';
            header("location: updatedata.php");
        } else if (empty($Password_staff)){
            $_SESSION['error'] = 'Please input password';
            header("location: updatedata.php");
        } else if (strlen($_POST['Password_staff']) > 20 || strlen($_POST['Password_staff']) < 8) {
            $_SESSION['error'] = 'Please setting password length between 8-12 character';
            header("location: updatedata.php");
        } else if (empty($PositionID)){
            $_SESSION['error'] = 'Please choose position';
            header("location: updatedata.php");
        } else if (empty($WorkStationID)){
            $_SESSION['error'] = 'Please choose work station';
            header("location: updatedata.php");
        } else if (empty($Salary)){
            $_SESSION['error'] = 'Please input salary';
            header("location: updatedata.php");
        } else if (empty($StartWorkDate)){
            $_SESSION['error'] = 'Please input start work date';
            header("location: updatedata.php");
        } else if (empty($BranchHotel_ID)){
            $_SESSION['error'] = 'Please choose branch hotel';
            header("location: updatedata.php");
        } else {
                $check_email = "SELECT Email FROM staff_information WHERE Email = '$Email' ";
                $result = mysqli_query($con, $check_email);
                $row = mysqli_fetch_assoc($result);

                if (!isset($_SESSION['error'])) {
                    $passwordHash = md5($Password_staff);
                    $stmt = "UPDATE staff_information SET Firstname = '$Firstname' , Lastname = '$Lastname', 
                    Gender = '$Gender', DOB ='$DOB', Staff_Phone='$Staff_Phone', Address_staff='$Address_staff', 
                    Email='$Email', Password_staff='$passwordHash', MaritalStatus='$MaritalStatus', 
                    Nationality='$Nationality', Religion='$Religion', PositionID='$PositionID', 
                    WorkStationID='$WorkStationID', Salary='$Salary', StartWorkDate='$StartWorkDate', 
                    BranchHotel_ID ='$BranchHotel_ID', Status_Staff_ID = '100'
                    WHERE Staff_ID = $Staff_ID";          
                    
                    $result = mysqli_query($con,$stmt);
    
                    if ($result) {
                        header("location: ManagerStaff.php");
                    }else {
                        $_SESSION['error'] = "Something went wrong";
                        header("location: updatedata.php?Staff_ID= $Staff_ID");
                        exit();
                    }
                }

        }
    }
?>
