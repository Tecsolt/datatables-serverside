<?php
require_once "../controladores/base.controlador.php";
require_once "../modelos/base.modelo.php";

class TablaClaves
{
    public function mostrarTablaClaves()
    {
        $claves = ControladorBase::crtMostrarClavesServer();

        $clavesArray = $claves["data"];

        if (count($clavesArray) == 0) {
            echo '{"draw":0, "iTotalRecords":0,"iTotalDisplayRecords":0,"data":[]}';
            return;
        }

        $datosJson = '{
        "draw" : ' . $claves["draw"] . ',
        "iTotalRecords" :   ' . $claves["iTotalRecords"] . ',
        "iTotalDisplayRecords" :  ' . $claves["iTotalDisplayRecords"] . ',
        "data" : [';

        for ($i = 0; $i < count($clavesArray); $i++) {
            $datosJson .= '{
                "id":           "' . ($i + 1) . '",
                "codigo":       "' . $clavesArray[$i]["codigo"] . '",
                "descripcion":  "' . $clavesArray[$i]["descripcion"] . '"
            },';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;

    }
}

$activarClaves = new TablaClaves();
$activarClaves->mostrarTablaClaves();
