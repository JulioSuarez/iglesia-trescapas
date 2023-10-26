<?php
ob_start();
?>

<h1 class="text-3xl mb-4">Registrar un nuevo <?php echo $titulo; ?></h1>

<form method="POST" action="/feligres/store" class="w-1/2">
    <div class="mb-4">
        <label for="nombre" class="block">*Nombre:</label>
        <input type="text" id="nombre" name="nombre" required class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="apellidos" class="block">*Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="sexo" class="block">*Sexo:</label>
        <select id="sexo" name="sexo" class="w-full p-2 border border-gray-300 rounded">
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="telefono" class="block">*Teléfono:</label>
        <input type="text" id="telefono" name="telefono" class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="fecha_nacimiento" class="block">*Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="w-full">
        <p class="mt-4">Quien te Invito:</p>
        <section>
            <div class="flex">
                <label for="relacion" class="block p-2 w-18">yo soy:</label>
                <select id="relacion" name="relacion" class="w-fit p-2 border border-gray-300 mb-4 rounded">
                    <option value="">Seleccione una relación</option>
                    <option value="Hermano">Hermano</option>
                    <option value="Hermana">Hermana</option>
                    <option value="Padre">Padre</option>
                    <option value="Madre">Madre</option>
                    <option value="Tio">Tio</option>
                    <option value="Tia">Tia</option>
                    <option value="Primo">Primo</option>
                    <option value="Prima">Prima</option>
                    <option value="Amigo">Amigo</option>
                    <option value="Amiga">Amiga</option>
                    <option value="Conocido">Conocido</option>
                    <option value="Conocida">Conocida</option>
                </select>

                <label for="id_anfitrion" class="block p-2"> de: </label>
                <select id="id_anfitrion" name="id_anfitrion" class="w-fit p-2 border border-gray-300 mb-4 rounded">
                    <option value="">Seleccione un invitado</option>
                    <?php
                    foreach ($Feligreses as $anfitrion) {
                        echo '<option value="' . $anfitrion['id'] . '">' . $anfitrion['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>

        </section>
    </div>


    <!-- Otros campos de la tabla Feligres -->

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    <a href="/feligres/index" type="button" class="text-white  hover:underline px-4 py-2 border bg-red-500 rounded ml-2">Cancelar</a>
</form>


<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>