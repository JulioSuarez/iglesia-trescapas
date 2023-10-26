<?php
ob_start();
?>

<h1 class="text-3xl mb-4">Registrar a un nuevo miembro al Ministerio: <?php echo $ministerio['nombreMinisterio']; ?></h1>
<h1 class="text-3xl mb-4"></h1>

<form method="POST" action="/ministerio/storeMiembro" class="w-full">

    <div class="w-full">
        <input type="hidden" name="id_ministerio" value="<?php echo $ministerio['id']; ?>">
        <p class="mt-4">Elige al Nuevo Miembro:</p>
        <section>
            <div class="flex">
                <select id="id_feligres" name="id_feligres" class="w-full p-2 border border-gray-300 mb-4 rounded">
                    <?php
                    foreach ($feligreses as $lider) {
                        echo '<option value="' . $lider['id'] . '">' . $lider['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </section>
    </div>

    <div class="w-full">
        <p>Cargo que desempeña en el ministerio</p>
        <select id="cargo" name="cargo" class="w-full p-2 border border-gray-300 mb-4 rounded">
            <option value="miembro">miembro</option>
            <option value="secretario">secretario</option>
            <option value="tesorero">tesorero</option>
            <option value="lider">lider</option>
        </select>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
    <a href="/ministerio/index" type="button" class="text-white  hover:underline px-4 py-2 border bg-red-500 rounded ml-2">Cancelar</a>
</form>


<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>