<?php
ob_start();
?>
<div class="container mx-auto p-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl mb-4">Listado de Aportes</h1>
        <a href="/aporte/create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Nuevo Aporte</a>
    </div>
    <div class="border shadow p-2">
        <table class="w-full">
            <thead class="border-b">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Aportante</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($aportesall as $aporte) {
                    echo '<tr>';
                    echo '<td class="px-4 py-2 text-center">' . $aporte['id'] . '</td>';
                    echo '<td class="px-4 py-2 text-center">' . $aporte['descripcion'] . ' Bs.- '.$aporte['monto'] . '</td>';
                    echo '<td class="px-4 py-2 text-center">' . $aporte['fecha_creacion'] . '</td>';
                    echo '<td class="px-4 py-2 text-center">' . $aporte['id_feligres'] . '</td>';
                    echo '<td class="px-4 py-2 text-center">
                            <a href="/aporte/show/' . $aporte['id'] . '" class="text-center text-blue-500 hover:underline">Detalle</a> |
                            <a href="/aporte/edit/' . $aporte['id'] . '" class="text-center text-green-500 hover:underline">Editar</a> |
                            <a href="/aporte/delete/' . $aporte['id'] . '" class="text-center text-red-500 hover:underline">Eliminar</a>
                        </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>