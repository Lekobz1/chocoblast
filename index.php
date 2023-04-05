<?php

require_once './App/utils/BddConnect.php';

//Analyse de l'URL avec parse_url() et retourne ses composants 
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/'; 
/*--------------------------ROUTER -----------------------------*/ //test de la valeur $path dans l'URL et import de la ressource 
switch($path){
        //route /choblast/accueil -> ./test.php
        case $path === "/chocoblast/" or $path === "/chocoblast/accueil"  :
            include './App/controler/ControlerAccueil.php';
            break ;
        //route /choblast/inscription -> ./test.php
        case $path === "/chocoblast/inscription" :
            include './App/controler/ControlerAddUser.php';
            break ;
        //route /choblast/test -> ./controler/controler_add_user.php
        case $path === "/chocoblast/connexion":
            include './App/controler/controlerSign.php';
            break ;
        //si rien ne correspond : route -> ./App/controler/Controler404.php
        default : 
            include './App/controler/Controler404.php';
} 
?>