<?php

function conectarDB(): mysqli{
    // $db = mysqli_connect('localhost', 'usuario','contraseña','bienes_raices');
    $db = new mysqli('localhost', '','','bienes_raices');
   

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;

}