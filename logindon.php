<?php
   session_start();
   include("db.php");
   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    $email=$_POST['Email_address'];
    $password = $_POST['Password'];
    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
      $query="select * from signup where Email_address='$email' limit 1";
      $result=mysqli_query($con,$query);
      if($result)
      {
        if($result && mysqli_num_rows($result)>0)
        {
          $user_data=mysqli_fetch_assoc($result);
          if($user_data['Password']==$password)
          {
            echo "<script>
            alert('Signin successful');
            window.location.href = 'donor page.html';
          </script>";
          }
        }
      }
      echo "wrong email id or password";
    }
  }
  ?>