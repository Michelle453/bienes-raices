<fieldset>
    <legend>
        Información general
    </legend>

    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="propiedad[titulo]"  placeholder="Título propiedad" value="<?php echo s($propiedad->titulo);?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]"  placeholder="Precio de la propiedad" value="<?php echo s($propiedad->precio);?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php if($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" class="imagen-small">
    <?php endif;?>
    <label for="descripcion">Descripcion</label>
    <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad->descripcion);?></textarea>

</fieldset>

<fieldset>
    <legend>
        Información propiedad
    </legend>

    <label for="habitaciones">Habitaciones</label>
    <input name="propiedad[habitaciones]" type="number" id="habitaciones" placeholder="Ej: 3" min="1" value="<?php echo s($propiedad->habitaciones);?>">

    <label for="wc">Baños</label>
    <input name="propiedad[wc]" type="number" id="wc" placeholder="Ej: 1" min="1" value="<?php echo s($propiedad->wc);?>">

    <label for="estacionamiento">Estacionamiento</label>
    <input name="propiedad[estacionamiento]"  type="number" id="estacionamiento" placeholder="Ej: 1" min="1" value="<?php echo s($propiedad->estacionamiento);?>">

</fieldset>

<fieldset>
    <legend>
        Vendedor
    </legend>

    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor" required>
         <option selected>-- Seleccione el vendedor --</option>
        <?php foreach($vendedores as $vendedor): ?>
           
            <option <?php echo $vendedor->id===$vendedor->id?'selected':''; ?>
             value="<?php echo s($vendedor->id); ?>">
                <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
            </option>
        <?php endforeach; ?>
    </select>

</fieldset>

