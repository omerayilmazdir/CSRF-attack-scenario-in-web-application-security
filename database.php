<?php
session_start();

try{
    $db = new PDO('mysql:host=localhost;dbname=csrftest', 'root', '');
} catch (PDOException $e){
    die($e->getMessage());
}



if(!isset($_POST['_token'])){
    $_SESSION['_token'] = md5(time() . rand(0,999999));
}
