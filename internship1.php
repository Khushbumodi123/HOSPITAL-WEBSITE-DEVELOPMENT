<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['f_name']) && isset($_POST['l_name']) &&
        isset($_POST['email']) && isset($_POST['phone']) &&
        isset($_POST['gender']) && isset($_POST['birthday']) && 
        isset($_POST['current']) && && isset($_POST['permanent']) && isset($_POST['pincode'])) {
        
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $current = $_POST['current'];
        $permanent = $_POST['permanent'];
        $pincode = $_POST['pincode'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "register";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register($f_name, $l_name, $email,$phone, $gender, $birthday,$current,$permanent,$pincode) values(?, ?, ?, ?, ?, ?,?,?)";

            $stmt = $conn->prepare($Select);        //Prepares an SQL statement for execution
            $stmt->bind_param("s", $email);         //s is corresponding variable has type string and Binds variables to a prepared statement as parameters
            $stmt->execute();
            $stmt->bind_result($resultEmail);       //Binds variables to a prepared statement for result storage
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii",$f_name, $l_name, $email,$phone, $gender, $birthday,$current,$permanent,$pincode);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
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
}
else {
    echo "Submit button is not set";
}
?>