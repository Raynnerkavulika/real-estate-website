<?php 
include 'config.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:login.php');
}

if(isset($_POST['post_property'])){
    $id = create_unique_id();
    $property_name = $_POST['property_name'];
    $property_name = filter_var($property_name,FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price,FILTER_SANITIZE_STRING);
    $deposit = $_POST['deposit'];
    $deposit = filter_var($deposit,FILTER_SANITIZE_STRING);
    $address = $_POST['address'];
    $address = filter_var($address,FILTER_SANITIZE_STRING);
    $offer = $_POST['offer'];
    $offer = filter_var($offer,FILTER_SANITIZE_STRING);
    $property_type = $_POST['property_type'];
    $property_type = filter_var($property_type,FILTER_SANITIZE_STRING);
    $property_status = $_POST['property_status'];
    $property_status = filter_var($property_status,FILTER_SANITIZE_STRING);
    $furnished_status = $_POST['furnished_status'];
    $furnished_status = filter_var($furnished_status,FILTER_SANITIZE_STRING);
    $number_of_bhk = $_POST['number_of_bhk'];
    $number_of_bhk = filter_var($number_of_bhk,FILTER_SANITIZE_STRING);
    $number_of_bathroom = $_POST['number_of_bathroom'];
    $number_of_bathroom = filter_var($number_of_bathroom,FILTER_SANITIZE_STRING);
    $number_of_bedroom = $_POST['number_of_bedroom'];
    $number_of_bedroom = filter_var($number_of_bedroom,FILTER_SANITIZE_STRING);
    $number_of_balcony = $_POST['number_of_balcony'];
    $number_of_balcony = filter_var($number_of_balcony,FILTER_SANITIZE_STRING);
    $carpet_area = $_POST['carpet_area'];
    $carpet_area = filter_var($carpet_area,FILTER_SANITIZE_STRING);
    $property_age = $_POST['property_age'];
    $property_age = filter_var($property_age,FILTER_SANITIZE_STRING);
    $total_floors = $_POST['total_floors'];
    $total_floors = filter_var($total_floors,FILTER_SANITIZE_STRING);
    $floor_room = $_POST['floor_room'];
    $floor_room = filter_var($floor_room,FILTER_SANITIZE_STRING);
    $loan = $_POST['loan'];
    $loan = filter_var($loan,FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description,FILTER_SANITIZE_STRING);
 
    if(isset($_POST['lift'])){
        $lift = $_POST['lift'];
        $lift = filter_var($lift,FILTER_SANITIZE_STRING);
    }else{
        $lift = 'no';
    }

    if(isset($_POST['security_guard'])){
        $security_guard = $_POST['security_guard'];
        $security_guard = filter_var($security_guard,FILTER_SANITIZE_STRING);
    }else{
        $security_guard = 'no';
    }

    if(isset($_POST['play_ground'])){
        $play_ground = $_POST['play_ground'];
        $play_ground = filter_var($play_ground,FILTER_SANITIZE_STRING);
    }else{
        $play_ground = 'no';
    }

    if(isset($_POST['garden'])){
        $garden = $_POST['garden'];
        $garden = filter_var($garden,FILTER_SANITIZE_STRING);
    }else{
        $garden = 'no';
    }

    if(isset($_POST['power_backup'])){
        $power_backup = $_POST['power_backup'];
        $power_backup = filter_var($power_backup,FILTER_SANITIZE_STRING);
    }else{
        $power_backup = 'no';
    }

    if(isset($_POST['parking_area'])){
        $parking_area = $_POST['parking_area'];
        $parking_area = filter_var($parking_area,FILTER_SANITIZE_STRING);
    }else{
        $parking_area = 'no';
    }

    if(isset($_POST['water_supply'])){
        $water_supply = $_POST['water_supply'];
        $water_supply = filter_var($water_supply,FILTER_SANITIZE_STRING);
    }else{
        $water_supply = 'no';
    }

    if(isset($_POST['gym'])){
        $gym = $_POST['gym'];
        $gym = filter_var($gym,FILTER_SANITIZE_STRING);
    }else{
        $gym = 'no';
    }

    if(isset($_POST['shopping_mall'])){
        $shopping_mall = $_POST['shopping_mall'];
        $shopping_mall = filter_var($shopping_mall,FILTER_SANITIZE_STRING);
    }else{
        $shopping_mall = 'no';
    }

    if(isset($_POST['hospital'])){
        $hospital = $_POST['hospital'];
        $hospital = filter_var($hospital,FILTER_SANITIZE_STRING);
    }else{
        $hospital = 'no';
    }

    if(isset($_POST['school'])){
        $school = $_POST['school'];
        $school = filter_var($school,FILTER_SANITIZE_STRING);
    }else{
        $school = 'no';
    }

    if(isset($_POST['market_area'])){
        $market_area = $_POST['market_area'];
        $market_area = filter_var($market_area,FILTER_SANITIZE_STRING);
    }else{
        $market_area = 'no';
    }

    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01,FILTER_SANITIZE_STRING);
    $image_01_ext = pathinfo($image_01,PATHINFO_EXTENSION);
    $rename_image_01 = create_unique_id().'.'.$image_01_ext;
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_folder = 'uploaded_files/'.$rename_image_01;

    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02,FILTER_SANITIZE_STRING);
    $image_02_ext = pathinfo($image_02,PATHINFO_EXTENSION);
    $rename_image_02 = create_unique_id().'.'.$image_02_ext;
    $image_02_size = $_FILES['image_02']['size'];
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_size = $_FILES['image_02']['size'];
    $image_02_folder = 'uploaded_files/'.$rename_image_02;

    if(!empty($image_02)){
        if($image_02_size > 2000000){
            $warning_msg[] = 'image 02 size is too large!';
        }else{
            move_uploaded_file($image_02_tmp_name,$image_02_folder);
        }
    }else{
        $rename_image_02 = '';
    }

    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03,FILTER_SANITIZE_STRING);
    $image_03_ext = pathinfo($image_03,PATHINFO_EXTENSION);
    $rename_image_03 = create_unique_id().'.'.$image_03_ext;
    $image_03_size = $_FILES['image_03']['size'];
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_size = $_FILES['image_03']['size'];
    $image_03_folder = 'uploaded_files/'.$rename_image_03;

    if(!empty($image_03)){
        if($image_03_size > 2000000){
            $warning_msg[] = 'image 03 size is too large!';
        }else{
            move_uploaded_file($image_03_tmp_name,$image_03_folder);
        }
    }else{
        $rename_image_03 = '';
    }

    $image_04 = $_FILES['image_04']['name'];
    $image_04 = filter_var($image_04,FILTER_SANITIZE_STRING);
    $image_04_ext = pathinfo($image_04,PATHINFO_EXTENSION);
    $rename_image_04 = create_unique_id().'.'.$image_04_ext;
    $image_04_size = $_FILES['image_04']['size'];
    $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
    $image_04_size = $_FILES['image_04']['size'];
    $image_04_folder = 'uploaded_files/'.$rename_image_04;

    if(!empty($image_04)){
        if($image_04_size > 2000000){
            $warning_msg[] = 'image 04 size is too large!';
        }else{
            move_uploaded_file($image_04_tmp_name,$image_04_folder);
        }
    }else{
        $rename_image_04 = '';
    }

    $image_05 = $_FILES['image_05']['name'];
    $image_05 = filter_var($image_05,FILTER_SANITIZE_STRING);
    $image_05_ext = pathinfo($image_05,PATHINFO_EXTENSION);
    $rename_image_05 = create_unique_id().'.'.$image_05_ext;
    $image_05_size = $_FILES['image_05']['size'];
    $image_05_tmp_name = $_FILES['image_05']['tmp_name'];
    $image_05_size = $_FILES['image_05']['size'];
    $image_05_folder = 'uploaded_files/'.$rename_image_05;

    if(!empty($image_05)){
        if($image_05_size > 2000000){
            $warning_msg[] = 'image 05 size is too large!';
        }else{
            move_uploaded_file($image_05_tmp_name,$image_05_folder);
        }
    }else{
        $rename_image_05 = '';
    }

    if($image_01_size > 2000000){
        $warning_msg[] = 'image 01 size is too large!';
    }else{
        $insert_property = $conn->prepare("INSERT INTO `property`(id,user_id,property_name,
        address,price,property_type,offer,property_status,furnished_status,mumber_of_bhk,deposit,number_of_bedroom,number_of_bathroom,number_of_balcony,carpet_area,age,total_floors,
        floor_room,loan,lift,security_guard,play_ground,garden,water_supply,power_backup,
        parking_area,gym,shopping_mall,hospital,school,market_area,image_01,image_02,image_03,
        image_04,image_05,description) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
        ?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $insert_property->execute([$id,$user_id,$property_name,
        $address,$price,$property_type,$offer,$property_status,$furnished_status,$number_of_bhk,$deposit,$number_of_bedroom,
        $number_of_bathroom,$number_of_balcony,$carpet_area,$property_age,$total_floors,$floor_room,$loan,$lift,$security_guard,
        $play_ground,$garden,$water_supply,$power_backup,$parking_area,$gym,$shopping_mall,$hospital,$school,$market_area,
        $image_01,$image_02,$image_03,$image_04,$image_05,$description]);
        move_uploaded_file($image_01_tmp_name,$image_01_folder);
        $success_msg[] = 'Your property has been posted successfully';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post property</title>

    <!-- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
     <!-- custom css file link -->
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- user header starts -->
     <?php include 'user_header.php'  ?>
    <!-- user header ends -->


<section class="property-form">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>property details</h3>

      <div class="box">
         <p>property name <span>*</span></p>
         <input type="text" name="property_name" placeholder="enter the property name" required class="input">
      </div>

      <div class="flex">

        <div class="box">
            <p>property price <span>*</span></p>
            <input type="number" name="price" min="0" placeholder="enter the property price" required class="input">
        </div>

        <div class="box">
            <p>deposit amount <span>*</span></p>
            <input type="number" name="deposit" min="0" placeholder="enter the deposit amount" required class="input">
        </div>

        <div class="box">
            <p>property address <span>*</span></p>
            <input type="text" name="address"  placeholder="enter the property address" required class="input">
        </div>

        <div class="box">
            <p>offer type <span>*</span></p>
            <select name="offer" class="input">
                <option value="" selected disabled>----select an offer type----</option>
                <option value="sale">sale</option>
                <option value="resale">resale</option>
                <option value="rent">rent</option>
            </select>
        </div>

        <div class="box">
            <p>property type <span>*</span></p>
            <select name="property_type" class="input">
                <option value="" selected disabled>----select property type----</option>
                <option value="flat">flat</option>
                <option value="mansion">mansion</option>
                <option value="bungalow">bungallow</option>
            </select>
        </div>

        <div class="box">
            <p>property status <span>*</span></p>
            <select name="property_status" class="input">
                <option value="" selected disabled>----select property status----</option>
                <option value="ready to move">ready to move</option>
                <option value="under construction">under construction</option>
            </select>
        </div>

        <div class="box">
            <p>furnished status <span>*</span></p>
            <select name="furnished_status" class="input">
                <option value="" selected disabled>----select a furnishing status----</option>
                <option value="furnished">furnished</option>
                <option value="semi furnished">semi furnished</option>
                <option value="unfurnished">unfurnished</option>
            </select>
        </div>

        <div class="box">
            <p>how many BHK <span>*</span></p>
            <select name="number_of_bhk" class="input">
                <option value="" selected disabled>----how many bhk----</option>
                <option value="1BHK">1BHK</option>
                <option value="2BHK">2BHK</option>
                <option value="3BHK">3BHK</option>
                <option value="5BHK">5BHK</option>
                <option value="5BHK">5BHK</option>
            </select>
        </div>

        <div class="box">
            <p>how many bedrooms <span>*</span></p>
            <select name="number_of_bedroom" class="input">
                <option value="" selected disabled>----how many bedrooms----</option>
                <option value="1 bedroom">1 bedroom</option>
                <option value="2 bedrooms">2 bedrooms</option>
                <option value="3 bedrooms">3 bedrooms</option>
                <option value="4 bedrooms">4 bedrooms</option>
                <option value="5 bedrooms">5 bedrooms</option>
            </select>
        </div>

        <div class="box">
            <p>how many bathroom <span>*</span></p>
            <select name="number_of_bathroom" class="input">
                <option value="" selected disabled>----how many bathrooms----</option>
                <option value="1 bathroom">1 bathroom</option>
                <option value="2 bathrooms">2 bathrooms</option>
                <option value="3 bathrooms">3 bathrooms</option>
                <option value="4 bathrooms">4 bathrooms</option>
                <option value="5 bathrooms">5 bathrooms</option>
            </select>
        </div>

        <div class="box">
            <p>how many balcony <span>*</span></p>
            <select name="number_of_balcony" class="input">
                <option value="" selected disabled>----how many balcony----</option>
                <option value="0 balcony">0 balcony</option>
                <option value="1 balcony">1 balcony</option>
                <option value="2 balconys">2 balconys</option>
                <option value="3 balconys">3 balconys</option>
                <option value="4 balconys">4 balconys</option>
                <option value="5 balconys">5 balconys</option>
            </select>
        </div>

        <div class="box">
            <p>carpet area <span>*</span></p>
            <input type="number" name="carpet_area" min="0" placeholder="how many sqrft" required class="input">
        </div>

        <div class="box">
            <p>property age <span>*</span></p>
            <input type="number" name="property_age" min="0" placeholder="property age" required class="input">
        </div>

        <div class="box">
            <p>total floors <span>*</span></p>
            <input type="number" name="floor" min="0" placeholder="number of floor" required class="input">
        </div>

        <div class="box">
            <p>floor room <span>*</span></p>
            <input type="number" name="floor_room" min="0" placeholder="floor room" required class="input">
        </div>

        <div class="box">
            <p>loan <span>*</span></p>
            <select name="loan" class="input">
                <option value="" selected disabled>----loan-----</option>
                <option value="available">available</option>
                <option value="not available">not available</option>
            </select>
        </div>
      </div>

      <div class="box">
        <p>property description <span>*</span></p>
        <textarea name="description" cols="30" rows="10" class="input" required placeholder="enter the property description"></textarea>
      </div>

      <div class="checkbox">
        <div class="box">
            <p><input type="checkbox" name="lift" value="yes" />lift</p>
            <p><input type="checkbox" name="security_guard" value="yes" />security guard</p>
            <p><input type="checkbox" name="play_ground" value="yes" />play ground</p>
            <p><input type="checkbox" name="garden" value="yes" />garden</p>
            <p><input type="checkbox" name="water_supply" value="yes" />water supply</p>
            <p><input type="checkbox" name="power_backup" value="yes" />power backup</p>
        </div>
        <div class="box">
            <p><input type="checkbox" name="parking_area" value="yes" />packing area</p>
            <p><input type="checkbox" name="gym" value="yes" />gym</p>
            <p><input type="checkbox" name="shopping_mall" value="yes" />shopping mall</p>
            <p><input type="checkbox" name="hospital" value="yes" />hospital</p>
            <p><input type="checkbox" name="school" value="yes" />school</p>
            <p><input type="checkbox" name="market_area" value="yes" />market area</p>
        </div>
      </div>

      <div class="box">
        <p>image 01 <span>*</span></p>
        <input type="file" name="image_01" class="input" required accept="image/*">
      </div>
      <div class="flex">

        <div class="box">
            <p>image 02 </p>
            <input type="file" name="image_02" class="input" accept="image/*">
        </div>
        <div class="box">
            <p>image 03 </p>
            <input type="file" name="image_03" class="input" accept="image/*">
        </div>
        <div class="box">
            <p>image 04 </p>
            <input type="file" name="image_04" class="input" accept="image/*">
        </div>
        <div class="box">
            <p>image 05 </p>
            <input type="file" name="image_05" class="input" accept="image/*">
        </div>
                      
      </div>

      <input type="submit" name="post_property" class="btn" value="post_property">
   </form>
</section>










    <!-- sweet alert cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!-- custom js file link -->
 <script src="script.js"></script>

 <?php include 'message.php'  ?>

</body>
</html>
































