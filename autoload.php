<?php
/**
 * Autor: Julico Suarez
 */
spl_autoload_register(function ($clase) {
    
    $ruta = '../' . str_replace("\\","/", $clase) . ".php";
    
    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        die("Ruta no encontrada $clase en $ruta AUTOLOAD");
    }
});
