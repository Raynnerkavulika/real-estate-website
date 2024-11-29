<?php
$dbname = 'mysql:host=localhost;dbname=real_estate';
$username = 'root';
$password = '';

$conn = new PDO($dbname,$username,$password);

function create_unique_id(){
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $char_len = strlen($char);
    $rand_str = '';
    for($i = 0; $i < 20; $i++){
        $rand_str .= $char[mt_rand(0, $char_len - 1)];
    }
    return $rand_str;
}

