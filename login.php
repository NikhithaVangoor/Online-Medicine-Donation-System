<?php
   session_start();
   include("db.php");
   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    $email=$_POST['loginid'];
    $password = $_POST['password'];
    if(!empty($email) && !empty($password) )
    {
      $query="select * from ngo_signup where ngo_email_address='$email' limit 1";
      $result=mysqli_query($con,$query);
      if($result)
      {
        if($result && mysqli_num_rows($result)>0)
        {
          $user_data=mysqli_fetch_assoc($result);
          if($user_data['ngo_password']==$password)
          {
            echo "<script>
            alert('Signin successful');
            window.location.href = 'ngo page.html';
          </script>";
          }
        }
      }
      echo "wrong email id or password";
    }
   }
   else{

   }
    
   
   ?>

