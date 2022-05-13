<?php 

    session_start();
    require('dbconnect.php');

    if (isset($_POST['upload_staff'])) {
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
            header("location: manager.php");
        } else if (empty($Lastname)){
            $_SESSION['error'] = 'Please input lastname';
            header("location: manager.php");
        } else if (empty($Gender)){
            $_SESSION['error'] = 'Please choose gender';
            header("location: manager.php");
        } else if (empty($MaritalStatus)){
            $_SESSION['error'] = 'Please choose marital status';
            header("location: manager.php");
        } else if (empty($Nationality)){
            $_SESSION['error'] = 'Please input nationality';
            header("location: manager.php");
        } else if (empty($Religion)){
            $_SESSION['error'] = 'Please input religion';
            header("location: manager.php");
        } else if (empty($DOB)){
            $_SESSION['error'] = 'Please choose date of birth';
            header("location: manager.php");
        } else if (empty($Staff_Phone)){
            $_SESSION['error'] = 'Please input phone number';
            header("location: manager.php");
        } else if (empty($Address_staff)){
            $_SESSION['error'] = 'Please input address';
            header("location: manager.php");
        } else if (empty($Email)){
            $_SESSION['error'] = 'Please input email';
            header("location: manager.php");
        } else if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'E-mail is not correct form';
            header("location: manager.php");
        } else if (empty($Password_staff)){
            $_SESSION['error'] = 'Please input password';
            header("location: manager.php");
        } else if (strlen($_POST['Password_staff']) > 20 || strlen($_POST['Password_staff']) < 8) {
            $_SESSION['error'] = 'Please setting password length between 8-12 character';
            header("location: manager.php");
        } else if (empty($PositionID)){
            $_SESSION['error'] = 'Please choose position';
            header("location: manager.php");
        } else if (empty($WorkStationID)){
            $_SESSION['error'] = 'Please choose work station';
            header("location: manager.php");
        } else if (empty($Salary)){
            $_SESSION['error'] = 'Please input salary';
            header("location: manager.php");
        } else if (empty($StartWorkDate)){
            $_SESSION['error'] = 'Please input start work date';
            header("location: manager.php");
        } else if (empty($BranchHotel_ID)){
            $_SESSION['error'] = 'Please choose branch hotel';
            header("location: manager.php");
        } else {

                $check_email = "SELECT Email FROM staff_information WHERE Email = '$Email' ";
                $result = mysqli_query($con, $check_email);
                $row = mysqli_fetch_assoc($result);

                if (!isset($_SESSION['error'])) {
                    $passwordHash = md5($Password_staff);
                    $stmt = "INSERT INTO staff_information(Firstname, Lastname, Gender, DOB, Staff_Phone, Address_staff, Email, Password_staff, MaritalStatus, Nationality, Religion, PositionID, WorkStationID, Salary, StartWorkDate, BranchHotel_ID, Status_Staff_ID)
                        VALUES('$Firstname', '$Lastname', '$Gender', '$DOB', '$Staff_Phone', '$Address_staff', '$Email', '$passwordHash', '$MaritalStatus', '$Nationality', '$Religion', '$PositionID', '$WorkStationID', '$Salary', '$StartWorkDate', '$BranchHotel_ID', '100')";                    
                    
                    $result = mysqli_query($con, $stmt);
    
                    if ($result) {
                        header("location: ManagerStaff.php");
                    }else {
                        $_SESSION['error'] = "Something went wrong";
                        header("location: manager.php");
                    }
                }

        }
    }
?>
