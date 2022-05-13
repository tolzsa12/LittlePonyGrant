<?php
require('dbconnect.php');

$Staff_ID = $_GET["Staff_ID"];
$sql = "DELETE FROM staff_information WHERE Staff_ID = $Staff_ID";
$result = mysqli_query($con,$sql);

if($result){
    header("location:ManagerStaff.php");
    exit(0);
}else{
    echo "ไม่สามารถลบได้ มีข้อผิดพลาดเกิดขึ้น";
}
?>
