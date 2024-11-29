<?php 
include 'config.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my listing</title>

    <!-- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
     <!-- custom css file link -->
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- user header starts -->
     <?php include 'user_header.php'  ?>
    <!-- user header ends -->



    <!-- my listings section starts -->

    <section class="my_listings">
        <h3 class="title">my listings</h3>

        <div class="box-container">
            <?php 
               $select_listing = $conn->prepare("SELECT * FROM `property` WHERE user_id = ? ORDER BY date DESC");
               $select_listing->execute([$user_id]);
               if($select_listing->rowCount() > 0){
                 while($fetch_listing = $select_listing->fetch(PDO::FETCH_ASSOC)){

                    $listing_id = $fetch_listing['id'];

                    if(!empty($fetch_listing['image_02'])){
                        $image_02 = 1;
                    }else{
                        $image_02 = 0;
                    }
                    if(!empty($fetch_listing['image_03'])){
                        $image_03 = 1;
                    }else{
                        $image_03 = 0;
                    }
                    if(!empty($fetch_listing['image_04'])){
                        $image_04 = 1;
                    }else{
                        $image_04 = 0;
                    }
                    if(!empty($fetch_listing['image_05'])){
                        $image_05 = 1;
                    }else{
                        $image_05 = 0;
                    }

                    $total_imaages = (1 + $image_02 + $image_03 + $image_04 + $image_05);
            ?>

               <form action="" method="post">
                <div class="thumb">
                    
                    <img src="uploaded_files/<?= $fetch_listing['image_01'];?>" alt="">
                </div>
                  <p class="name"><?= $fetch_listing['property_name'];?></p>

               </form>
            <?php  
                    }
                }else{
                echo'<p class="empty">no listings found!</p>';
                }
            ?>
        </div>
    </section>
    <!-- my listings section ends -->










    <!-- sweet alert cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!-- custom js file link -->
 <script src="script.js"></script>

 <?php include 'message.php'  ?>

</body>
</html>