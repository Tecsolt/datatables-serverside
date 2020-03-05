<?php
function autocargar() {

    foreach (glob('controladores/*.php') as $controllers) {
        require_once $controllers;
    }

    foreach (glob('modelos/*.php') as $models) {
        require_once $models;
    }
}
spl_autoload_register('autocargar');

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
