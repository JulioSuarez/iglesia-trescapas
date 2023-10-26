<?php

namespace Negocios;
/**
 * Autor: Julico Suarez
 */
class Negocio{
    public function view($route, $params = []){

        extract($params);

        $route = str_replace('.', '/', $route);
        if (file_exists('../Presentacion/' . $route . '.php')) {
            ob_start();
            include '../Presentacion/' . $route . '.php';
            $content = ob_get_clean();

            return $content;
        }else{
            echo "No se encontro la presentacion {$route}";
        }
    }

    public function redirect($route){
        header("Location: {$route}");
    }
}