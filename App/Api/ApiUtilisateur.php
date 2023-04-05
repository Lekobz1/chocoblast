<?php

    include './App/model/Utilisateur.php';
    include './App/manager/ManagerUtilisateur.php';
    class ApiUtilisateur extends Utilisateur{

        function public AddUtilisateur(){
            //
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST');
            header('Content-Type');
        }
    }



?>