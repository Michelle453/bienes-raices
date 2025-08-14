<?php 

    require 'includes/funciones.php';
   
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="imgage/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">

        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,00</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones" loading="lazy">
                    <p>4</p>
                </li>
            </ul>

            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, eum nihil! Vero animi cum hic magnam quisquam reiciendis, officiis obcaecati modi sequi? A facere minima repudiandae unde, blanditiis nam iusto.
            </p>
            <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit hic accusantium quam architecto pariatur incidunt, mollitia atque neque aliquid ut nihil aliquam quas, nulla repudiandae voluptate eum amet dolor porro?</p>
        </div>

    </main>


<?php 
   
   incluirTemplate('footer');
?>

