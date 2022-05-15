<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "internship";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if($conn){
        ?>
    <script>
        alert('connection successful');
    </script>
    <?php
    }
    else{
        die("no connection" . mysqli_connect_errno());
    }
?>