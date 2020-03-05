<?php

require_once "conexion.php";

class ModeloBase
{
    static public function mdlMostrarBaseClaves($tabla)
    {
        $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
        $stm->execute();
        return $stm->fetchAll();
        $stm->close();
        $stm = null;
    }

    static public function mdlMostrarBaseClavesServer($table)
    {
        ##Leer los valores
        $draw = $_POST["draw"];
        $row = $_POST["start"];
        $rowsPorPagina = $_POST["length"];
        $columnIndex = $_POST["order"][0]['column'];
        $columnName = $_POST["columns"][$columnIndex]['data'];
        $columnOrder = $_POST["order"][0]['dir'];
        $busqueda = $_POST["search"]["value"];

        $busquedaArray = array();

        $busquedaConsulta = "";
        if ($busqueda != "") {
            $busquedaConsulta = "AND (
            c_ClaveProdServ LIKE :c_ClaveProdServ OR
            Descripcion LIKE :Descripcion)";
            $busquedaArray = array(
                'c_ClaveProdServ' => "%$busqueda%",
                'Descripcion' => "%$busqueda%"
            );
        }

        ##total de registros
        $stm = Conexion::conectar()->prepare("SELECT COUNT(*) AS cuentaAll FROM $table");
        $stm->execute();
        $registros = $stm->fetch();
        $totalRegistros = $registros["cuentaAll"];

        ##total de registros filtrados
        $stm = Conexion::conectar()->prepare("SELECT COUNT(*) AS cuentaAll FROM $table WHERE 1 " . $busquedaConsulta);
        $stm->execute($busquedaArray);
        $registros = $stm->fetch();
        $totalRegistrosConFiltro = $registros["cuentaAll"];

        ##traer todos los registro
        $stm = Conexion::conectar()->prepare("SELECT * FROM $table WHERE 1 " . $busquedaConsulta . "ORDER BY " . $columnName . " " . $columnOrder . " LIMIT :limit,:offset");


        //$stm = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY id LIMIT 0,10");

        foreach ($busquedaArray as $key => $item) {
            $stm->bindParam(':' . $key, $item, PDO::PARAM_STR);
        }
        $stm->bindParam(':limit', $row, PDO::PARAM_INT);
        $stm->bindParam(':offset', $rowsPorPagina, PDO::PARAM_INT);
        $stm->execute();
        $registrosTotales = $stm->fetchAll();

        $data = array();

        foreach ($registrosTotales as $rowsRegistros) {
            $data[] = array(
                "id" => $rowsRegistros["id"],
                "codigo" => $rowsRegistros["c_ClaveProdServ"],
                "descripcion" => $rowsRegistros["Descripcion"],
            );
        }

        ##retorno de informacion

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRegistros,
            "iTotalDisplayRecords" => $totalRegistrosConFiltro,
            "data" => $data
        );

        return $response;


    }

}
