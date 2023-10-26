<?php
ob_start();
?>

<div class="container mx-auto p-4 border shadow">
    <h1 class="text-2xl mb-4">Crear Nuevo Aporte</h1>

    <form method="POST" action="/aporte/store">
        <div class="border p-4 mb-4">

            <div class="mb-4">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha_creacion" value="<?= date("Y-m-d") ?>" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="aportante">Aportante:</label>
                <select id="aportante" name="id_feligres" class="w-full p-2 border border-gray-300 rounded">
                    <?php foreach ($feligreses as $feligres) {
                        echo '<option value="' . $feligres['id'] . '">' . $feligres['nombre'] . '</option>';
                    }; ?>
                </select>
            </div>
        </div>

        <!-- Detalles del Aporte -->
        <div class="mb-4 p-2">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-xl mb-4">Detalles del Aporte</h2>
                <button type="button" id="agregar-detalle" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Detalle</button>
            </div>
            <div id="detalle-aporte" class="border shadow p-2">
                <div class="mb-2">
                    <label for="tipo_ingreso">Tipo de Ingreso:</label>
                    <select name="tipo_ingreso[]" class="border">
                        <option value="Donacion">Donación</option>
                        <option value="Diezmo">Diezmo</option>
                        <option value="Ofrenda">Ofrenda</option>
                        <option value="Aportacion">Aportación</option>
                        <option value="Patrocinio">Patrocinio</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion[]" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-2">
                    <label for="monto">Monto:</label>
                    <input type="number" name="monto[]" step="0.01" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
            </div>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Aporte</button>
    </form>
</div>

<script>
    document.getElementById("agregar-detalle").addEventListener("click", function() {
        var detalleAporte = document.getElementById("detalle-aporte");
        var nuevoDetalle = detalleAporte.cloneNode(true);
        detalleAporte.appendChild(nuevoDetalle);
    });
</script>

<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>