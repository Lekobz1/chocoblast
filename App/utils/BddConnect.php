<?php

    class BddConnect{

        public static function connexion(){
            return new PDO('mysql:host=localhost;dbname=chocoblast', 'root','root', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
    }

?>