<?php
/**
 * Autor: Julico Suarez
 */
use config\Route;
use Negocios\Negocio;
use Negocios\NAportes;
use Negocios\NFeligres;
use Negocios\NMinisterio;

// Home
Route::get('/',function(){
    $negocio = new Negocio();
    $content = "Bienvenido";
    $titulo = "Home";
    $imagen = '<img src=' . '"' . ASSETS .'img/trescapas.png'.'"'. 'alt='.'"'.'Mi Imagen'.'"'.'>';
    Return $negocio->view('home', compact('content','titulo','imagen'));
});

//Feligres
Route::get('/feligres/index', [NFeligres::class,'index']);
Route::get('/feligres/create', [NFeligres::class,'create']);
Route::post('/feligres/store', [NFeligres::class,'store']);
Route::get('/feligres/show/:id', [NFeligres::class,'show']);
Route::get('/feligres/edit/:id', [NFeligres::class,'edit']);
Route::post('/feligres/update/:id', [NFeligres::class,'update']);
Route::get('/feligres/delete/:id', [NFeligres::class,'destroy']);

//Ministerio
Route::get('/ministerio/index', [NMinisterio::class,'index']);
Route::get('/ministerio/create', [NMinisterio::class,'create']);
Route::post('/ministerio/store', [NMinisterio::class,'store']);
Route::get('/ministerio/addMiembros/:id', [NMinisterio::class,'addMiembros']);
Route::post('/ministerio/storeMiembro', [NMinisterio::class,'storeMiembro']);
Route::get('/ministerio/show/:id', [NMinisterio::class,'show']);
Route::get('/ministerio/edit/:id', [NMinisterio::class,'edit']);
Route::post('/ministerio/update/:id', [NMinisterio::class,'update']);
Route::get('/ministerio/delete/:id', [NMinisterio::class,'destroy']);

//Aporte
Route::get('/aporte/index', [NAportes::class,'index']);
Route::get('/aporte/create', [NAportes::class,'create']);
Route::post('/aporte/store', [NAportes::class,'store']);
Route::get('/aporte/show/:id', [NAportes::class,'show']);
Route::get('/aporte/edit/:id', [NAportes::class,'edit']);
Route::post('/aporte/update/:id', [NAportes::class,'update']);
Route::get('/aporte/delete/:id', [NAportes::class,'destroy']);

Route::dispatch();