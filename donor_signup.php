<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bharath_medicine_donation";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
    // Assuming the form submits the email and password fields using POST method
    $name = $_POST['User_name'];
    $email=$_POST['Email_address'];
    $password = $_POST['Password'];
    $mobile=$_POST['Mobile'];
    $address=$_POST['Address'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Validate and sanitize the input values if necessary

    $sql = "INSERT INTO `signup` (User_name,Email_address,Password,Mobile,Address) VALUES ('$name','$email','$password','$mobile','$address')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Data inserted successfully
        echo "<script>
                alert('Signup successful');
                window.location.href = 'donor page.html';
              </script>";
    } else {
        die(mysqli_error($conn));
    }
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>

