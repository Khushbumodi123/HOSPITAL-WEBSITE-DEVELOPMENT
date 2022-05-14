<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="internship";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $pincode = $_POST['pincode'];

//For inserting the values to mysql database 
$sql_query = "INSERT INTO internship (f_name, l_name, email,phone, gender, birthday,address1,address2,pincode)
VALUES ('$f_name', '$l_name', '$email','$phone', '$gender', '$birthday','$address1','$address2','$pincode')";
if (mysqli_query($conn, $sql_query))
{
echo "New Details Entry inserted successfully !";
}
else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>