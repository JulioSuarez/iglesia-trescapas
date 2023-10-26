<?php

namespace Negocios;

/**
 * Autor: Julico Suarez
 */

use Datos\DFeligres;

class NFeligres extends Negocio
{
    public function index()
    {
        $titulo = "Feligreses";
        $Feligres = new DFeligres();
        $Feligreses = $Feligres->all();
        // $variable = new modelo();
        // return $variable->where('id','>=', '1')->get();
        // return $variable->find(2);
        // return $variable->all();
        // return $variable->query("SELECT * FROM variables")->get();
        return $this->view('PFeligres.index', compact('Feligreses', 'titulo'));
    }

    public function create()
    {
        $titulo = "Feligreses";
        $Feligres = new DFeligres();
        $Feligreses = $Feligres->all();
        return $this->view('PFeligres.create', compact('titulo', 'Feligreses'));
    }

    public function store()
    {
        $data = $_POST;
        // var_dump($data);
        if ($data['id_anfitrion'] == '' || $data['id_anfitrion'] == null) {
            $data['id_anfitrion'] = null;
            $data['relacion'] = null;
        }
        $data['fecha_registro'] = date('Y-m-d');
        $Feligres = new DFeligres();
        $Feligres->create($data);
        return $this->redirect('/feligres/index');
    }

    public function edit($id)
    {
        $feligres = new DFeligres();
        $feligres = $feligres->find($id);
        $titulo = "Feligreses";
        return $this->view('PFeligres.edit', compact('titulo', 'feligres'));
    }

    public function update($id)
    {
        $Feligres = new DFeligres();
        $Feligres->update($id, $_POST);
        return $this->redirect('/feligres/index');
    }

    public function show($id)
    {
        $Feligres = new DFeligres();
        $Feligres = $Feligres->find($id);
        
        $rebanio = new DFeligres();
        $rebanio = $rebanio->where('id_anfitrion','=', $id)->get();


        $titulo = "Rebaño";

        return $this->view('PFeligres.show', compact('Feligres', 'titulo', 'rebanio'));
    }

    public function destroy($id)
    {
        var_dump($id);
        $Feligres = new DFeligres();
        $Feligres->delete($id);
        return $this->redirect('/feligres/index');
    }
}
