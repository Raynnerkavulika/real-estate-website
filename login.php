<?php 
include 'config.php';


if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

if(isset($_POST['submit'])){
   
    $email = $_POST['email'];
    $email = filter_var($email,FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password,FILTER_SANITIZE_STRING);


    $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
    $verify_user->execute([$email,$password]);
    $row = $verify_user->fetch(PDO::FETCH_ASSOC);

    if($verify_user->rowCount() > 0){
       setcookie('user_id',$row['id'],time() + 60*60*24*30,'/');
       $success_msg[] = 'registered successfully';
       header('location:home.php');
    }else{
      $warning_msg[] = 'incorrect email or password!';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
     <!-- custom css file link -->
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- user header starts -->
     <?php include 'user_header.php'  ?>
    <!-- user header ends -->

<section class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <h3> <i class="fas fa-smile"></i> welcome back!</h3>
        <input type= "email" name= "email" placeholder="enter your email" required class="box">
        <input type="password" name="password" placeholder="enter your password" required class="box">
        <input type="submit" name="submit" value="login now" required class="btn">
        <p>don't have an account? <a href="register.php">register now</a></p>
    </form>
</section>



    <!-- sweet alert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!-- custom js file link -->
 <script src="script.js"></script>

 <?php include 'message.php'  ?>

</body>
</html>