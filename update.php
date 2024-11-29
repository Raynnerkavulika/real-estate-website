<?php 
include 'config.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

$select_account = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_account->execute([$user_id]);
$fetch_account = $select_account->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){
    
    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number,FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email,FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password,FILTER_SANITIZE_STRING);
    $cpassword = $_POST['cpassword'];
    $cpassword = filter_var($cpassword,FILTER_SANITIZE_STRING);


    $select = $conn->prepare("SELECT * FROM users WHERE email=?");
    $select->execute([$email]);

    if($select->rowCount()>0){
        $warning_msg[] ="User already exist";
    }else{
        if($password != $cpassword){
            $warning_msg[] ="Confirm password does not match";
        }else{
            $insert_user = $conn->prepare("INSERT INTO users(id,name,number,email,password) VALUES(?,?,?,?,?)");
            $insert_user->execute([$id,$name,$number,$email,$cpassword]);

            if($insert_user){
              $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
              $verify_user->execute([$email,$cpassword]);
              $row = $verify_user->fetch(PDO::FETCH_ASSOC);

              if($verify_user->rowCount() > 0){
                 setcookie('user_id',$row['id'],time() + 60*60*24*30,'/');
                 header('location:home.php');
              }else{
                $error_msg[] = 'something went wrong!';
              }
            }
        }
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
        <h3> update your profile</h3>
        <input type="text" name="name" value="<?= $fetch_account['name'];?>" class="box">
        <input type= "number" name= "number" value="<?= $fetch_account['number'];?>" min="0" class="box">
        <input type= "email" name= "email" value="<?= $fetch_account['email'];?>" class="box">
        <input type="password" name="old_password" placeholder="enter your old password" class="box">
        <input type="password" name="new_password" placeholder="enter your new password" class="box">
        <input type="password" name="cpassword" placeholder="confirm your new password" class="box">
        <input type="submit" name="update" value="update profile" required class="btn">
    </form>
</section>



    <!-- sweet alert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!-- custom js file link -->
 <script src="script.js"></script>

 <?php include 'message.php'  ?>

</body>
</html>