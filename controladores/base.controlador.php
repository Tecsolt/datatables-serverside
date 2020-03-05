<?php

class ControladorBase
{
    static public function crtMostrarClaves()
    {
        $tabla = "claves";
        $respuesta = ModeloBase::mdlMostrarBaseClaves($tabla);
        return $respuesta;
    }

    static public function crtMostrarClavesServer()
    {
        $tabla = "claves";
        $respuesta = ModeloBase::mdlMostrarBaseClavesServer($tabla);
        return $respuesta;
    }

}
