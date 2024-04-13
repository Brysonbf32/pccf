<?php
try{
    $my_bd=NEW PDO('mysql:host=localhost;dbname=tbl_pccf','root','');
}
catch(Exception $e){
    header('location: ../error.php');
}
?>