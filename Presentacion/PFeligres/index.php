<?php
ob_start();
?>

<h1 class="text-3xl mb-4">Gestionar <?php echo $titulo; ?></h1>

<a class="bg-blue-500 text-white px-4 py-2 rounded" href="/feligres/create">Registrar nuevo feligres</a>

<table class="w-full mt-4">
    <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Apellidos</th>
            <th class="px-4 py-2">Sexo</th>
            <th class="px-4 py-2">Teléfono</th>
            <th class="px-4 py-2">Fecha de Nacimiento</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through $feligreses and populate the table
        foreach ($Feligreses as $feligres) {
            echo '<tr>';
            echo '<td class="px-4 py-2 text-center">' . $feligres['id'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $feligres['nombre'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $feligres['apellidos'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $feligres['sexo'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $feligres['telefono'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $feligres['fecha_nacimiento'] . '</td>';
            echo '<td class="px-4 py-2 text-center">';
            echo '<a class="text-blue-500 hover:underline mr-2" href="/feligres/show/' . $feligres['id'] . '">Rebaño</a>';
            echo '<a class="text-green-500 hover:underline mr-2" href="/feligres/edit/' . $feligres['id'] . '">Editar</a>';
            echo '<a class="text-red-500 hover:underline" href="/feligres/delete/' . $feligres['id'] . '">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>