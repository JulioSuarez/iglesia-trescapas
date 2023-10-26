<?php
ob_start();
?>

<h1 class="text-3xl mb-4">Registrar un nuevo <?php echo $titulo; ?></h1>

<form method="POST" action="/ministerio/store" class="w-full">
    <div class="mb-4">
        <label for="nombreMinisterio" class="block">*Nombre del Ministerio:</label>
        <input type="text" id="nombreMinisterio" name="nombreMinisterio" required class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="descripcion" class="block">*Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" required class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="w-full">
        <p class="mt-4">Elige al Lider de este Ministerio:</p>
        <section>
            <div class="flex">
                <select id="id_lider" name="id_lider" class="w-fit p-2 border border-gray-300 mb-4 rounded">
                    <?php
                    foreach ($feligreses as $lider) {
                        echo '<option value="' . $lider['id'] . '">' . $lider['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>

        </section>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    <a href="/ministerio/index" type="button" class="text-white  hover:underline px-4 py-2 border bg-red-500 rounded ml-2">Cancelar</a>
</form>


<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>