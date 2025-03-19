<?PHP
$Servername="localhost:3306";
$username="root";
$password="";
$dbname="nmak_final";

$conn =mysqli_connect($Servername,$username,$password,$dbname);
if(mysqli_connect_error()){
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

@$mobile=$_POST['mobile'];
@$name=$_POST['name'];
@$dob=$_POST['dob'];
@$gender=$_POST['gender'];
@$address=$_POST['address'];
@$aadhar=$_POST['aadhar'];
@$password=$_POST['password'];


$sql="insert into REGISTER_AS_USER set Name = '".$name."'
, gender = '".$gender."', dob = '".$dob."', password = '".$password."'
, address = '".$address."', mobile = '".$mobile."', aadhar = '".$aadhar."'";
  //execution
  if($conn->query($sql)===TRUE)
     echo "New record created successfully";
    else
    echo "error".$sql."<br>".$conn->error;
header('loaction:REGISTER_AS_USER.HTML');
exit();

?>