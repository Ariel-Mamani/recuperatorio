<?php
//En la clase Venta: Se registra la fecha, el cliente, número de factura, tipo de 
//comprobante (Tipo A o B) y la colección de ítems vendidos
class Venta{
    private $fecha;
    private $objCliente;
    private $numFactura;
    private $tipoComprobante;
    private $colItems;

    public function __construct($fecha,$objCliente,$numFactura,$tipoComprobante,$colItems)
    {
        $this->fecha= $fecha;
        $this->objCliente= $objCliente;
        $this->numFactura= $numFactura;
        $this->tipoComprobante=$tipoComprobante;
        $this->colItems=$colItems;
    }
    /*Se pide un método incorporarProducto que recibe por parámetro un producto y la 
    cantidad que desea registrarse en la venta. Si es posible realizar la venta, teniendo
    en cuenta la cantidad solicitada y la cantidad en stock del producto, se crea un item
    y se incorpora a la colección de items de la venta.
    Recordar que debe actualizarse el stock del producto si la venta se realiza con éxito.
    El método debe retornar el objeto de productos modificado si se pudo realizar la 
    venta o null en caso contrario.*/
    public function incorporarProducto($objProducto,$cantAVender){
        $colItems=$this->getColItem();
        $stock=$this->getItem();
        $unProducto=null;
        if($cantAVender<=$stock){
            $nuevoItem= new Item($cantAVender,$objProducto);
            array_push($colItems,$nuevoItem);
            $this->setColItem($colItems);
            $cantStockRestante=$objProducto->getStock()-$cantAVender;
            $objProducto->actualizarStock($cantStockRestante);
            $unProducto=$objProducto;
        }
        return $unProducto;
    }
}