<?php
$server="localhost:3306";
$username="root";
$password="";
$dbname="nmak_final";

$con=mysqli_connect($server, $username, $password, $dbname);


if(mysqli_connect_error())
{
die('connect error('. mysqli_connect_errno() .')'
.mysqli_connect_error());
}



@$name =$_POST['name'];
@$email=$_POST['email'];
@$message=$_POST['message'];

$sql="INSERT INTO reviews(Name, Email, Message) VALUES ('$name','$email','$message')";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>