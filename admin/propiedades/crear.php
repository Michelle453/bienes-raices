<?php 

    //database
    require '../../includes/config/database.php';

    $db = conectarDB();

    //arreglo con mensajes de errores
    $errores = [];

    //variables formulario
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_id = '';
    

    //ejecutar codigo despues de enviar formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = (float)$_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = (int)$_POST['habitaciones'];
        $wc = (int)$_POST['wc'];
        $estacionamiento = (int)$_POST['estacionamiento'];
        $vendedores_id = (int)$_POST['vendedor'];
        
        if(!$titulo){
            $errores[] = "Debes añadir un título";
        }
        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }
        if(strlen($descripcion)>50){
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
        if(!$habitaciones){
            $errores[] = "Debes ingresar el número de habitaciones";
        }
        if(!$wc){
            $errores[] = "Debes ingresar el número de baños";
        }
        if(!$estacionamiento){
            $errores[] = "Debes ingresar el númeo de estacionamientos";
        }
        if(!$vendedores_id){
            $errores[] = "Debes seleccionar el vendedor";
        }

        
        if(empty($errores)){
       
            //insertar en DB
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedores_id')";

            //echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado){
                echo "insertado";
            }
        }

    }

   

    require '../../includes/funciones.php';
   
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):?>
        
        <div class="alerta error">
            <?php echo $error;?>
        </div>

            
        <?php endforeach;?>

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
            <fieldset>
                <legend>
                    Información general
                </legend>

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo"  placeholder="Título propiedad">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio"  placeholder="Precio de la propiedad">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion"></textarea>

            </fieldset>

            <fieldset>
                <legend>
                    Información propiedad
                </legend>

                <label for="habitaciones">Habitaciones</label>
                <input name="habitaciones" type="number" id="habitaciones" placeholder="Ej: 3" min="1">

                <label for="wc">Baños</label>
                <input name="wc" type="number" id="wc" placeholder="Ej: 1" min="1">

                <label for="estacionamiento">Estacionamiento</label>
                <input name="estacionamiento"  type="number" id="estacionamiento" placeholder="Ej: 1" min="1">

            </fieldset>

            <fieldset>
                <legend>
                    Vendedor
                </legend>

                <select name="vendedor" id="" required>
                    <option value="" disabled selected>--Seleccione al vendedor --</option>
                    <option value="1">Michelle</option>
                    <option value="2">Karen</option>
                </select>

            </fieldset>

            <input type="submit" class="boton boton-verde" value="Crear propiedad">

        </form>

    </main>


<?php 
   
    incluirTemplate('footer');
?>

