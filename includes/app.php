<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__."/../vendor/autoload.php";


//conectar DB
$db = conectarDB();
use Model\ActiveRecord;
ActiveRecord::setDB($db);


