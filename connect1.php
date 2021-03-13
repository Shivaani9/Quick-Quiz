<?php
  $email = $_POST['email'];
  $password = $_POST['password'];

  $con = new mysqli("localhost","root","","test");
  if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
  }
  else{
    $stmt = $con->prepare("select * from registration where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
      $data = $stmt_result->fetch_assoc();
      if($data['password'] === $password){
      echo '<script type="text/javascript">';
      echo  'alert("login successfully")';
      echo 'window.location.href = "localhost/Project/index"';
      echo '</script>';
      header("Location: http://localhost/Project/index.php");
      }
    }
    else {
      echo '<script type="text/javascript">';
      echo  'alert("Invalid Email or Password")';
      echo '</script>';
      header("Location: http://localhost/Project/index1.php");
    }
  }
 ?>
