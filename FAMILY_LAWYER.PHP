<?php
$server = "localhost:3306";
$username = "root";
$password = "";
$dbname = "nmak_final";

$con = mysqli_connect($server, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Handle file upload
$imageProcessed = false;
$filename = $filetype = $filedata = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['image'];
    
    // Validate file type
    $allowed_types = ['image/jpeg', 'image/jpg'];
    $file_type = $file['type'];
    $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (in_array($file_type, $allowed_types) && in_array($file_ext, ['jpg', 'jpeg'])) {
        $filename = mysqli_real_escape_string($con, $file['name']);
        $filetype = mysqli_real_escape_string($con, $file_type);
        $filedata = mysqli_real_escape_string($con, file_get_contents($file['tmp_name']));
        $imageProcessed = true;
    } else {
        die("Error: Only JPG/JPEG files are allowed.");
    }
} else {
    die("Error: Please upload a valid image file.");
}

// Retrieve form data
$name = mysqli_real_escape_string($con, $_POST['name']);
$mobile_no = mysqli_real_escape_string($con, $_POST['mobile_no']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$aadhar_no = mysqli_real_escape_string($con, $_POST['aadhar_no']);
$pan_no = mysqli_real_escape_string($con, $_POST['pan_no']);
$dob = mysqli_real_escape_string($con, $_POST['dob']);
$category = mysqli_real_escape_string($con, $_POST['category']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$experience = mysqli_real_escape_string($con, $_POST['Experience']);
$win_rate = mysqli_real_escape_string($con, $_POST['win_rate']);
$notable_achievement = mysqli_real_escape_string($con, $_POST['notable_achievement']);
$case_handled = mysqli_real_escape_string($con, $_POST['case_handled']);
$case_distribution = mysqli_real_escape_string($con, $_POST['case_distribution']);
$details = mysqli_real_escape_string($con, $_POST['details']);

// Create SQL query
$sql = "INSERT INTO `family_lawyer` (
    name, mobile_no, address, gender, dob, aadhar_no, pan_no, 
    experience, win_rate, notable_achievment, case_handled, 
    case_distribution, details, password, filename, filetype, filedata
) VALUES (
    '$name', '$mobile_no', '$address', '$gender', '$dob', 
    '$aadhar_no', '$pan_no', '$experience', '$win_rate', 
    '$notable_achievement', '$case_handled', '$case_distribution', 
    '$details', '$password', '$filename', '$filetype', '$filedata'
)";

// Execute query
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

header('Location: FAMILY_LAWYER.html');
exit();
?>