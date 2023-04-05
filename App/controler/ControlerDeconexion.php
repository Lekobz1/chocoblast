<?php
session_start();
$message ='';
if(isset($_SESSION['login'])){
    $message = $_SESSION['login'].' est bien deconnecté';
}else{
    $message = 'Vous n\'étes pas connecté';
}
session_unset();
session_destroy();

include './App/vue/view_deconexion.php'
?>