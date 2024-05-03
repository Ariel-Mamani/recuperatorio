<?php
//En la clase ítem: Se registra la cantidad vendida y la referencia al producto.
class Item{
    private $cantVendida;
    private $objProducto;

    public function __construct($cantVendida,$producto)
    {
        $this->cantVendida= $cantVendida;
        $this->objProducto= $producto;
    }
}