<?php

namespace Negocios;

/**
 * Autor: Julico Suarez
 */

use Datos\DMinisterio;
use Datos\DMinisterioFeligres;
use Datos\DFeligres;

class NMinisterio extends Negocio
{
    public function index()
    {
        $titulo = "Ministerio";
        $feligres = new DFeligres();
        $feligres = $feligres->all();
        $ministerios = new DMinisterio();
        $ministerios = $ministerios->all();

        $ministeriosall = [];
        foreach ($ministerios as $ministerio) {
            foreach ($feligres as $feligre) {
                if ($ministerio['id_lider'] == $feligre['id']) {
                    $ministerio['id_lider'] = $feligre['nombre'];
                    array_push($ministeriosall, $ministerio);
                }
            }
        }
        return $this->view('PMinisterio.index', compact('ministeriosall', 'titulo'));
    }

    public function create()
    {
        $titulo = "Ministerio";
        $ministerios = new DMinisterio();
        $ministerios = $ministerios->all();

        $feligreses = new DFeligres();
        $feligreses = $feligreses->all();
        return $this->view('PMinisterio.create', compact('titulo', 'ministerios', 'feligreses'));
    }

    public function store()
    {
        $data = $_POST;
        // var_dump($data);
        $data['fecha_creacion'] = date('Y-m-d');
        $ministerio = new DMinisterio();
        $ministerio->create($data);

        return $this->redirect('/ministerio/index');
    }

    public function edit($id)
    {
        $titulo = "Ministerio";
        $ministerio = new DMinisterio();
        $ministerio = $ministerio->find($id);
        return $this->view('PMinisterio.edit', compact('titulo', 'ministerio'));
    }

    public function update($id)
    {
        $ministerio = new DMinisterio();
        $ministerio->update($id, $_POST);
        return $this->redirect('/ministerio/index');
    }

    public function show($id)
    {
        $ministerio = new DMinisterio();
        $ministerio = $ministerio->find($id);

        $rebanio = new DMinisterioFeligres();
        $rebanio = $rebanio->where('id_ministerio', '=', $id)->get();

        $feligres = new DFeligres();
        $feligres = $feligres->all();

        $rebanioAll = [];
        foreach ($rebanio as $miembro) {
            foreach ($feligres as $feligre) {
                if ($miembro['id_feligres'] == $feligre['id']) {
                    $miembro['id_feligres'] = $feligre['nombre'];
                    array_push($rebanioAll, $miembro);
                }
            }
        }

        $lider = new DFeligres();
        $lider = $lider->find($ministerio['id_lider']);


        $titulo = "Rebaño";
        return $this->view('PMinisterio.show', compact('ministerio', 'titulo', 'rebanioAll', 'lider'));
    }

    public function destroy($id)
    {
        var_dump($id);
        $ministerio = new DMinisterio();
        $ministerio->delete($id);
        return $this->redirect('/ministerio/index');
    }

    public function addMiembros($id)
    {
        $titulo = "Ministerio";
        $ministerios = new DMinisterio();
        $feligreses = new DFeligres();
        $feligreses = $feligreses->all();
        $ministerio = $ministerios->find($id);
        return $this->view('PMinisterio.addMiembro', compact('titulo', 'ministerio', 'feligreses'));
    }

    public function storeMiembro()
    {
        $data = $_POST;
        $data['fecha_registro'] = date('Y-m-d');
        $miembro = new DMinisterioFeligres();
        $miembro->create($data);

        return $this->redirect('/ministerio/index');
    }
}
