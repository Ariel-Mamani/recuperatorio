<?php
//código barra, marca, color, talle, descripción y cantidad en stock. 
class Producto{
    private $codigoBarra;
    private $marca;
    private $color;
    private $talle;
    private $descripcion;
    private $cantidadStock;

    public function __construct($codigo,$marca,$color,$talle,$descripcion,$stock)
    {
        $this->codigoBarra= $codigo;
        $this->marca= $marca;
        $this->color= $color;
        $this->talle=$talle;
        $this->descripcion=$descripcion;
        $this->cantidadStock=$stock;
    }
    public function __toString()
    {
        return "Codigo de barra: ".$this->getCodigoBarra()."\n".
               "Marca: ".$this->getMarca()."\n".
               "Color: ".$this->getColor()."\n".
               "Talle: ".$this->getTalle()."\n".
               "Descripcion: ".$this->getDescripcion()."\n".
               "Stock: ".$this->getStock()."\n";
    }
    /*Se debe definir el método actualizarStock que recibe por parámetro una cantidad y 
    actualiza el valor del stock del producto según corresponda. Si el valor recibido por 
    parámetro es > 0, entonces se incrementa el stock y si el valor es <0 se decrementa el
     stock del producto*/
    public function actualizarStock($cantidad){
        $stock=$this->getStock();
        if($cantidad>0){
            $nuevoStock=$stock+$cantidad;
            $this->setStock($nuevoStock);
        }else{
            $nuevoStock=$stock-$cantidad;
            $this->setStock($nuevoStock);
        }
    }
}