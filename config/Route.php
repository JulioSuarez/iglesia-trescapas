<?php

namespace config;
/**
 * Autor: Julico Suarez
 */
class Route{
    
    private static $routes = [];
    
    public static function get($uri, $callback){
        $uri = trim($uri, '/');
        // var_dump("GET -> ".$uri);
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback){
        $uri = trim($uri, '/');
        // var_dump("POST -> ".$uri);
        self::$routes['POST'][$uri] = $callback;
    }

    public static function put($uri, $callback){
        $uri = trim($uri, '/');
        // var_dump("put -> ".$uri);
        self::$routes['PUT'][$uri] = $callback;
    }

    public static function delete($uri, $callback){
        $uri = trim($uri, '/');
        // var_dump("DELETE -> ".$uri);
        self::$routes['DELETE'][$uri] = $callback;
    }

    // public static function resource($uri, $callback){
    //     $uri = trim($uri, '/');
    //     self::$routes['GET'][$uri] = $callback;
    //     self::$routes['POST'][$uri] = $callback;
    //     self::$routes['PUT'][$uri] = $callback;
    //     self::$routes['DELETE'][$uri] = $callback;
    // }

    public static function dispatch(){
        $uri = $_SERVER['REQUEST_URI'];
        // var_dump($uri);
        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        // var_dump($method);
        foreach(self::$routes[$method] as $route => $callback){
            // var_dump($route);
            
            if(strpos($route,':') !== false){
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9-]+)', $route);
            }
            if(preg_match("#^$route$#", $uri, $matches)){
                $params = array_slice($matches, 1);
                // $response = $callback(...$params);

                if(is_callable($callback)){
                    $response = call_user_func_array($callback, $params);
                }
                if(is_array($callback)){
                    $controller = new $callback[0];
                    $response = call_user_func_array([$controller, $callback[1]], $params);
                }

                if(is_array($response) || is_object($response)){
                    header('Content-Type: application/json');
                    echo json_encode($response);
            }else{
                echo $response;
            }
            return;
            }
        }
        die('404 not found = Ruta no encontrada');
    }

    // public static function dispatch()
    // {
    //     $uri = $_SERVER['REQUEST_URI'];
    //     $uri = trim($uri, '/');
    //     $method = $_SERVER['REQUEST_METHOD'];

    //     foreach(self::$routes[$method] as $route => $callback){
            
    //         if(strpos($route,':') !== false){
    //             $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9-]+)', $route);
    //         }
    //         if(preg_match("#^$route$#", $uri, $matches)){
    //             $params = array_slice($matches, 1);
    //             // $response = $callback(...$params);

    //             if(is_callable($callback)){
    //                 $response = call_user_func_array($callback, $params);
    //             }
    //             if(is_array($callback)){
    //                 $controller = new $callback[0];
    //                 $response = call_user_func_array([$controller, $callback[1]], $params);
    //             }

    //             if(is_array($response) || is_object($response)){
    //                 header('Content-Type: application/json');
    //                 echo json_encode($response);
    //         }else{
    //             echo $response;
    //         }
    //         return;
    //         }
    //     }
    //     die('404 not found = Ruta no encontrada');
    // }
}