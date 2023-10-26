<?php
ob_start();
?>

<h1 class="text-3xl mb-4">Editar un <?php echo $titulo; ?></h1>

<form method="POST" action="/feligres/update/<?php echo $feligres['id'] ?>" class="w-full">
    <div class="mb-4">
        <label for="nombre" class="block">*Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $feligres['nombre'] ?>" required class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="apellidos" class="block">*Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $feligres['apellidos'] ?>" required class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="sexo" class="block">*Sexo:</label>
        <select id="sexo" name="sexo" class="w-full p-2 border border-gray-300 rounded">
            <option value="<?php echo $feligres['sexo'] ?>"><?php echo $feligres['sexo'] ?></option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="telefono" class="block">*Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $feligres['telefono'] ?>" class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="fecha_nacimiento" class="block">*Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $feligres['fecha_nacimiento'] ?>" class="w-full p-2 border border-gray-300 rounded">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    <a href="/feligres/index" type="button" class="text-white  hover:underline px-4 py-2 border bg-red-500 rounded ml-2">Cancelar</a>
</form>

<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>