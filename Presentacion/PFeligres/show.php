<?php
ob_start();
?>

<h1 class="text-3xl mb-4">Rebaño de <?php echo $Feligres['nombre']; ?></h1>

<div class="w-full mt-4">
    <ul class="border border-gray-300 divide-y divide-gray-300 rounded">
        <?php
        foreach ($rebanio as $feligres) {
            echo '<li class="p-4 flex items-center justify-between">';
            echo '<span class="text-center">' . $feligres['nombre'] . '</span>';
            echo '<span class="text-center">' . $feligres['relacion'] . '</span>';
            echo '</li>';
        }
        ?>
    </ul>
</div>



<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>