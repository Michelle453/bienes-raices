<fieldset>
    <legend>
        Información general
    </legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]"  placeholder="Nombre del vendedor(a)" value="<?php echo s($vendedor->nombre);?>">

    <label for="apellido">Apellidos:</label>
    <input type="text" id="apellido" name="vendedor[apellido]"  placeholder="Apellidos del vendedor(a)" value="<?php echo s($vendedor->apellido);?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="vendedor[telefono]"  placeholder="Teléfono del vendedor(a)" value="<?php echo ($vendedor->telefono);?>">
</fieldset>