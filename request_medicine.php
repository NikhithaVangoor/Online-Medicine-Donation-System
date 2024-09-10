<?php

// error_reporting(0);
session_start();
include("db.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form values
  $name = $_POST['name'];
  $email_address = $_POST['email'];
  $contact_number = $_POST['contact'];
  $requested_medicine = $_POST['medicine'];
  $quantity = $_POST['quantity'];

  // Establish database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bharath_medicine_donation";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if ($conn) {
    // Insert the form values into the "medicine_requests" table
    $query = "INSERT INTO `request`  (`Name`, `Email`, `Contact`, `Medicine`, `Quantity`) VALUES ('$name', '$email_address', '$contact_number', '$requested_medicine', '$quantity')";

    if (mysqli_query($conn, $query)) {
      //echo "Medicine request submitted successfully";
      // echo "<script>
      //       alert('medicine request submitted sccessfully');
      //       window.location.href='display_records.php'';
      // </script>";
      echo "<script>
                alert('medicine request submitted successfully');
                window.location.href = 'display_records.php';
              </script>";
    } else {
      echo "Failed to submit medicine request: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close the database connection
  } else {
    echo "Connection failed: " . mysqli_connect_error();
  }
}
?>
