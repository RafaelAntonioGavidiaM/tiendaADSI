<?php
require_once "conexion.php";

class modeloProductos{

    public static function mdlListarProductos(){
        $ObjRespuesta = Conexion::conectar()->prepare("SELECT * from productos order by idCategoria asc");
        $ObjRespuesta->execute();
        $objListaProductos = $ObjRespuesta->fetchAll();
        $ObjRespuesta = null;
        return $objListaProductos;
    }
}
