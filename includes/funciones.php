<?php

define('TEMPLATES_URL',__DIR__.'/templates');

define('FUNCIONES_URL',__DIR__.'funciones.php');

define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre,bool $inicio = false){
    include TEMPLATES_URL."/{$nombre}.php";
}

function estaAutenticado(){
    session_start();
   
    if(!$_SESSION['login']){
       header('location: /admin');
    }
   
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escape el html
function s($html):string{
    $s = htmlspecialchars($html);
    return $s;
}

//validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad'];
    return in_array($tipo,$tipos);
}

// mostrar mensajes de alerta
function mostrarNotificacion($codigo){
    $mensaje = '';
    switch($codigo){
        case 1:
            $mensaje = "Creado correctamente";
            break;
        case 2: 
            $mensaje = "Actualizado correctamente";
            break;
        case 3:
            $mensaje = "Eliminado correctamente";
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedirecionar(string $url){
    // obtener y validar id valido
    $resultadoId = $_GET['id'];
    $resultadoId = filter_var($resultadoId, FILTER_VALIDATE_INT);

    if(!$resultadoId){
        header("location: {$url}");
    }
    return $resultadoId;
}