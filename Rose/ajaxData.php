<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";

        $conn = mysqli_connect("localhost","root","","a4_GRANT");
        //check connection
        if(mysqli_connect_error()){
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }

    if(isset($_POST["Partial_Type_Booking_ID"])){
        $Partial_Type_Booking_ID = $_POST['Partial_Type_Booking_ID'];
        $sql = mysqli_query($conn, "SELECT * FROM list_booking WHERE Partial_Type_Booking_ID = '$Partial_Type_Booking_ID' ORDER BY Booking_Name");
        ?>
        <select name="room_no" class="form-control">
            <option selected disabled value="">Select Room No.</option>
             <?php
             while ($row = mysqli_fetch_array($sql)) {
                 ?>
                 <option value="<?php echo $row['Booking_ID'];?>"><?php echo $row['Booking_Name'];?></option>
                 <?php
             }
             ?>
        </select>
        <?php
    }


    if(isset($_POST["price"])){
        $Booking_ID = $_POST['Booking_ID'];
        $sql = "SELECT * FROM list_promotion NATURAL JOIN list_booking WHERE Booking_ID = '$Booking_ID'";
        $result = mysqli_query($conn, $sql);

            if ($result) {
                $price = mysqli_fetch_assoc($result);
    
                echo $price['PromotionPrice'];
            } else {
                echo "0";
            }

    }


?>

