<?php
    
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login']??false;
    if(!isset($inicio)){
        $inicio = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>

    <header class="header <?php echo $inicio?'inicio':''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raíces">
                </a>
                
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="Boton Dark Mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php elseif(!$auth): ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php endif;?>
                    </nav>
                </div>


            </div> <!--cierre de la barra-->

            

            <?php 
                echo $inicio? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>":"";
            ?>
            
        </div>
    </header>
    
    <?php echo $contenido;?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservados <?php
        echo $fecha = date('Y');?> &copy;<br>Desarrollado por: Michelle Berrio Sánchez</p>
        

    </footer>

    <script src="../build/js/bundle.min.js"></script>
    
</body>
</html>