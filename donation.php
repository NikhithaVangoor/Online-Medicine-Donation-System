<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bharath_medicine_donation";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
    // Assuming the form submits the email and password fields using POST method
    $tablet=$_POST['tablet-name'];
    $name = $_POST['manufactured-date'];
    $email=$_POST['expiry-date'];
    $password = $_POST['quantity'];
    $mobile=$_POST['brand-name'];
    
   // $address=$_POST['Address'];
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Validate and sanitize the input values if necessary

    $sql = "INSERT INTO `donateform` (`tablet-name`,`manufactured-date`,`expiry-date`,`quantity`,`brand-name`) VALUES ('$tablet','$name','$email','$password','$mobile')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Data inserted successfully
        echo "<script>
                alert('donation successful do you want to see donations');
                window.location.href = 'donatedmedicine.php';
              </script>";
    } else {
        die(mysqli_error($conn));
    }
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>
