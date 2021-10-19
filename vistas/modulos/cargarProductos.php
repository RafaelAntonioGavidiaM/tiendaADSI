<?php
$objProductos = new controladorProductos();
$ListaProductos = $objProductos->ctrListarProductos();
$anteriorCategoria = "";
$categoria = "";
$interface = "";


foreach ($ListaProductos as $key => $value) {
    $categoria = $value["idCategoria"];
    // empty: dice si una variable esta vacia o no esta cargargada
    if (empty($anteriorCategoria)) {     
        $anteriorCategoria = $categoria;
        $interface = '<div class="row mc-margenes">';
        $interface .= '<h1>'.$value["idCategoria"].'</h1>';
    }

    if ($anteriorCategoria != $categoria) {
        $interface .= '</div>';
        echo $interface;

        $anteriorCategoria = $categoria;
        $interface = '<div class="row mc-margenes">';
        $interface .= '<h1>'.$value["idCategoria"].'</h1>';
       
    }

    $ruta = "http://localhost/productoTienda/".$value["imagen"];

    $interface .= '<div class="col-sm-3">';
    $interface .= '<div class="panel panel-primary">';
    $interface .= '<div class="panel-heading">'.$value["nombre"].'</div>';
    $interface .= '<div class="panel-body"><img class="imgProducto" src="'.$ruta.'" class="img-responsive" style="width:100%" alt="Image"></div>';
    $interface .= '<div class="panel-footer">Buy 50 mobiles and get a gift card</div>';
    $interface .= '</div>';
    $interface .= '</div>';
}

$interface .= '</div>';
echo $interface;


?>