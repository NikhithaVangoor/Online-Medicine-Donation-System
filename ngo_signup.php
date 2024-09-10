<?php
error_reporting(0);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form values
  $ngo_name = $_POST['ngo_name'];
  $owner_name = $_POST['Owner_name'];
  $ngo_id = $_POST['Login_id2'];
  $ngo_password = $_POST['Password2'];
  $ngo_mobile = $_POST['mobile2'];
//   $ngo_address = $_POST['address2'];

  // Establish database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bharath_medicine_donation";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if ($conn) {
    // Insert the form values into the "signup" table
    $query = "INSERT INTO ngo_signup (ngo_name,owner_name, ngo_email_address, ngo_password, Mobile) VALUES ('$ngo_name','$owner_name','$ngo_id', '$ngo_password', '$ngo_mobile')";


    if (mysqli_query($conn, $query)) {
      echo "<script>
                alert('Signup successful');
                window.location.href = 'ngo page.html';
              </script>";
    } else {
      echo "Sign up failed: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close the database connection
  } else {
    echo "Connection failed: " . mysqli_connect_error();
  }
}
?>
