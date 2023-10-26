<?php

namespace Negocios;

/**
 * Autor: Julico Suarez
 */

use Datos\DAportes;
use Datos\DDetalleAportes;
use Datos\DFeligres;

class NAportes extends Negocio
{
    public function index()
    {
        $titulo = "Aportes";
        $feligres = new DFeligres();
        $feligres = $feligres->all();
        $aportes = new DAportes();
        $aportes = $aportes->all();
        $detalleAporte = new DDetalleAportes();
        $detalleAporte = $detalleAporte->all();

        $aportesall = [];
        foreach ($aportes as $aporte) {
            foreach ($detalleAporte as $detalle) {
                foreach ($feligres as $feligre) {
                    if ($aporte['id'] == $detalle['id_aporte']) {
                        if ($aporte['id_feligres'] == $feligre['id']) {
                            $aporte['descripcion'] = $detalle['descripcion'];
                            $aporte['id_feligres'] = $feligre['nombre'];
                            $aporte['monto'] = $detalle['monto'];
                            array_push($aportesall, $aporte);
                        }
                    }
                }
            }
        }
        return $this->view('PAportes.index', compact('aportesall', 'titulo'));
    }

    public function create()
    {
        $titulo = "Aportes";
        $feligreses = new DFeligres();
        $feligreses = $feligreses->all();
        return $this->view('PAportes.create', compact('titulo', 'feligreses'));
    }

    public function store()
    {
        $data = $_POST;

        // Obtener los datos principales del aporte
        $aporteData = [
            'fecha_creacion' => $data['fecha_creacion'],
            'id_feligres' => $data['id_feligres'],
            // Otros campos del aporte según tus necesidades
        ];

        // Crear el registro principal del aporte
        $aporte = new DAportes();
        $aporte->create($aporteData);

        // Obtener los detalles del aporte
        $tipoIngreso = $data['tipo_ingreso'];
        $descripcion = $data['descripcion'];
        $monto = $data['monto'];

        // Guardar los detalles del aporte
        foreach ($tipoIngreso as $key => $value) {
            $detalleData = [
                'tipo_ingreso' => $tipoIngreso[$key],
                'descripcion' => $descripcion[$key],
                'monto' => $monto[$key],
                'id_aporte' => $aporte->lastInsertId(), // Obtén el ID del aporte creado
            ];

            // Crear un registro de detalle de aporte
            $detalleAporte = new DDetalleAportes();
            $detalleAporte->create($detalleData);
        }

        return $this->redirect('/aporte/index');
    }

    public function edit($id)
    {
        $titulo = "Aportes";
        $ministerio = new DAportes();
        $ministerio = $ministerio->find($id);
        return $this->view('PAportes.edit', compact('titulo', 'ministerio'));
    }

    public function update($id)
    {
        $ministerio = new DAportes();
        $ministerio->update($id, $_POST);
        return $this->redirect('/aporte/index');
    }

    public function show($id)
    {
        $titulo = "Aporte";

        $aportes = new DAportes();
        $aportes = $aportes->find($id);

        $detalles = new DDetalleAportes();
        $detalles = $detalles->where('id_aporte', '=', $id)->get();

        $feligres = new DFeligres();
        $feligres = $feligres->find($aportes['id_feligres']);

        return $this->view('PAportes.show', compact('ministerio', 'titulo', 'rebanioAll', 'lider'));
    }

    public function destroy($id)
    {
        var_dump($id);
        $ministerio = new DAportes();
        $ministerio->delete($id);
        return $this->redirect('/aporte/index');
    }
}
