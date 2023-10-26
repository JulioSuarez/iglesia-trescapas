<?php
ob_start();
?>

<h1 class="text-3xl mb-4">Gestionar <?php echo $titulo; ?></h1>

<a class="bg-blue-500 text-white px-4 py-2 rounded" href="/ministerio/create">Registrar nuevo ministerio</a>

<table class="w-full mt-4">
    <thead>
        <tr>
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Nombre Ministerio</th>
            <th class="px-4 py-2">Descripcion</th>
            <th class="px-4 py-2">fecha de creacion</th>
            <th class="px-4 py-2">Lider</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through $ministerioes and populate the table
        // var_dump($ministeriosall);
        foreach ($ministeriosall as $ministerio) {
            echo '<tr>';
            echo '<td class="px-4 py-2 text-center">' . $ministerio['id'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $ministerio['nombreMinisterio'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $ministerio['descripcion'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $ministerio['fecha_creacion'] . '</td>';
            echo '<td class="px-4 py-2 text-center">' . $ministerio['id_lider'] . '</td>';
            
            echo '<td class="px-4 py-2 text-center">';
            echo '<a class="text-green-500 hover:underline mr-2" href="/ministerio/addMiembros/' . $ministerio['id'] . '">Add</a>';
            echo '<a class="text-blue-500 hover:underline mr-2" href="/ministerio/show/' . $ministerio['id'] . '">Miembros</a>';
            echo '<a class="text-yellow-500 hover:underline mr-2" href="/ministerio/edit/' . $ministerio['id'] . '">Editar</a>';
            echo '<a class="text-red-500 hover:underline" href="/ministerio/delete/' . $ministerio['id'] . '">Eliminar</a>';
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