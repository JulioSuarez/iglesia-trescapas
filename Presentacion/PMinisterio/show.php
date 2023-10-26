<?php
ob_start();
?>

<h1 class="text-3xl mb-2 font-semibold">Ministerio: <?php echo $ministerio['nombreMinisterio']; ?></h1>
<p class="text-2xl mb-4">Lider: <?php echo $lider['nombre']; ?></p>

<div class="w-full mt-4">
    <ul class="border border-gray-300 divide-y divide-gray-300 rounded">
        <?php
        foreach ($rebanioAll as $miembro) {
            echo '<li class="p-4 flex items-center justify-between">';
            echo '<span class="text-center">' . $miembro['id_feligres'] . '</span>';
            echo '<span class="text-center">' . $miembro['cargo'] . '</span>';
            echo '<span class="text-center">' . $miembro['fecha_registro'] . '</span>';
            echo '</li>';
        }
        ?>
    </ul>
</div>



<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>