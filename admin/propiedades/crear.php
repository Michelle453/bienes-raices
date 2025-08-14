<?php 

    require '../../includes/funciones.php';
   
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form action="" class="formulario">
            <fieldset>
                <legend>
                    Información general
                </legend>

                <label for="titulo">Título</label>
                <input type="text" id="titulo" placeholder="Título propiedad">

                <label for="precio">Precio</label>
                <input type="number" id="precio" placeholder="Precio de la propiedad">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion</label>
                <textarea name="" id="descripcion"></textarea>

            </fieldset>

            <fieldset>
                <legend>
                    Información propiedad
                </legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" id="habitaciones" placeholder="Ej: 3" min="1">

                <label for="wc">Baños</label>
                <input type="number" id="wc" placeholder="Ej: 1" min="1">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" placeholder="Ej: 1" min="1">

            </fieldset>

            <fieldset>
                <legend>
                    Vendedor
                </legend>

                <select name="" id="">
                    <option value="1">Michelle</option>
                    <option value="2">juan</option>
                </select>

            </fieldset>

            <input type="submit" class="boton boton-verde" value="Crear propiedad">

        </form>

    </main>


<?php 
   
    incluirTemplate('footer');
?>

