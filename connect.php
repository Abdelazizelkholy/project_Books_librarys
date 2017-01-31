<?php


$dsn   = "mysql:host=localhost;dbname=books";
$user  ="root";
$pass  = "";


try{

$conn = new PDO($dsn , $user ,$pass);
//echo 'yoy are  connected...';
}
 catch (PDOException $e){
     
    echo 'failed connection'.$e->getMessage() ;
 }