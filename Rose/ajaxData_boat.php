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




    if (isset($_POST['booking'])) {
        $room_no = $_POST['room_no'];
        $check_in_date = $_POST['check_in_date'];
        $check_out_date = $_POST['check_out_date'];
        $final_price = $_POST['final_price1'];
        $TaxandFee = $_POST['TaxandFee1'];
        $GuestName = $_POST['GuestName'];
        $Phone_Guest = $_POST['Phone_Guest'];
        $Message = $_POST['Message'];
        $PaymentMethod_ID = $_POST['PaymentMethod_ID'];
        $CardNumber = $_POST['CardNumber'];
        $MemberGuest = $_POST['MemberGuest'];
        $UserID = $_POST['UserID'];

        $minutes_to_add1 = 12;
        $minutes_to_add2 = 23;

        $time = new DateTime($check_in_date);
        $time->add(new DateInterval('PT' . $minutes_to_add1 . 'H'));
        $stamp = $time->format('Y-m-d H:i');

        $time2 = new DateTime($check_out_date);
        $time2->add(new DateInterval('PT' . $minutes_to_add2 . 'H'));
        $stamp2 = $time2->format('Y-m-d H:i');


        
        $main_reference_number_sql = "INSERT INTO main_reference_number (UserID,PriceTotalPayment,PaymentMethod_ID,CardNumber,TaxandFee,GuestName,Phone_Guest,Message) VALUES ('$UserID','$final_price','$PaymentMethod_ID','$CardNumber','$TaxandFee','$GuestName','$Phone_Guest','$Message')";
        $main_reference_number_result = mysqli_query($conn, $main_reference_number_sql);
        echo $UserID;
        if ($main_reference_number_result) {
            $ReferenceNumber = mysqli_insert_id($conn);
            $partial_reference_number_sql = "INSERT INTO partial_reference_number (Reference_PartialNumber,ReferenceNumber,Booking_ID,MemberGuest,CheckInDateTime,CheckOutDateTime,Staff_ID) VALUES ('','$ReferenceNumber','$room_no','$MemberGuest','$stamp','$stamp2','100001')";
            echo $ReferenceNumber;
            $partial_reference_number_result = mysqli_query($conn, $partial_reference_number_sql);
        
            $query = "SELECT * FROM partial_reference_number ORDER BY Reference_PartialNumber DESC LIMIT 1";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {

                $room_stats_sql = "UPDATE list_booking SET Status_Booking_ID = 200 WHERE Booking_ID = '$room_no'";
                header("location: success_room.php");

            } 
        
        } else {
            $response['done'] = false;
            $response['data'] = "DataBase Error add customer";
        }

    }
    
?>

