<?php
ob_start();
?>
<h1 class="text-lg font-semibold">EDIT</h1>
<p>Este es el contenido de mi vista.</p>

<?php
$content = ob_get_clean();
include '../Presentacion/home.php';
?>