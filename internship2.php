<?php

    include 'connection.php';

	$f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $pincode = $_POST['pincode'];

	$insertquery  = " insert into internship_form_data (f_name, l_name, email, phone, gender, birthday , address1 , address2, pincode) values('$f_name', '$l_name', '$email','$phone', '$gender', '$birthday','$address1','$address2','$pincode')";

    $res = mysqli_query( $conn , $insertquery );

    if($res){
        ?>
        <script>
             alert("data inserted properly");  
        </script>
        
        <?php
    }
    else{
        ?>
        <script>
             alert("data not inserted");   
        </script>
        
        <?php
    }
?>