<?php

 $f_name = $_POST['f_name'];
 $l_name = $_POST['l_name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $gender = $_POST['gender'];
 $birthday = $_POST['birthday'];
 $address1 = $_POST['address1'];
 $address2 = $_POST['address2'];
 $pincode = $_POST['pincode'];

    if (!empty($f_name) ||  !empty($l_name) || !empty($email) || !empty($phone) || !empty($gender) || !empty($birthday) || !empty($address1) || !empty($address2) || !empty($pincode)){
       
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "internship";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if (mysqli_connect_error()) {
            die('Connect Error('. mysqli_connect_errno().')' . mysqli_connect_error());
        }
        else {
            $Select = "SELECT email FROM internship WHERE email = ? LIMIT 1";
            $Insert = "INSERT Into internship (f_name, l_name, email,phone, gender, birthday,address1,address2,pincode) values(?, ?, ?, ?, ?, ?,?,?,?)";

            $stmt = $conn->prepare($Select);        //Prepares an SQL statement for execution
            $stmt->bind_param("s", $email);         //s is corresponding variable has type string and Binds variables to a prepared statement as parameters
            $stmt->execute();
            $stmt->bind_result($email);       //Binds variables to a prepared statement for result storage
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssisissi",$f_name, $l_name, $email,$phone, $gender, $birthday,$address1,$address2,$pincode);
                echo "New record inserted sucessfully.";
            }
            else {
                    echo "Someone already registers using this email.";
                }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
?>