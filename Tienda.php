<?php
/*En la clase Tienda se registra nombre, dirección, teléfono, la colección de productos y 
la colección de ventas realizadas.*/
class Tienda{
    private $nombre;
    private $direccion;
    private $telefono;
    private $colProductos;
    private $colVentas;

    public function __construct($nombre,$direccion,$telefono,$colProductos,$colVentas)
    {
        $this->nombre= $nombre;
        $this->direccion= $direccion;
        $this->telefono= $telefono;
        $this->colProductos=$colProductos;
        $this->colVentas=$colVentas;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    public function getColProductos(){
        return $this->colProductos;
    }
    public function setColProductos($productos){
        $this->colProductos=$productos;
    }
    public function getColVentas(){
        return $this->colVentas;
    }
    public function setColVentas($ventas){
        $this->colVentas=$ventas;
    }
    public function __toString()
    {
        return $this->getNombre()."\n".
               $this->getDireccion()."\n".
               $this->getTelefono()."\n".
               $this->retornaCadena($this->getColProductos())."\n".
               $this->retornaCadena($this->getColVentas());
    }
    public function retornaCadena($coleccion){
        $cadena=" ";
        foreach($coleccion as $elemento){
            $cadena=$cadena." ".$elemento."\n";
        }
        return $cadena;
    }
    /*Implementar el método buscarProducto que dado un código de barra por parámetro,
     retorna la el subíndice donde se encuentra un objeto producto con ese código de 
     barra. En caso de no encontrar el código de barra en la colección de productos 
     retornar*/
     public function buscarProducto($codigoBarra){
        $indice=-1;
        $i=0;
        $colProductos=$this->getColProductos();
        $verifica=false;
        while($i<count($colProductos) && !$verifica){
            if($codigoBarra==$colProductos[$i]->getCodigoBarra()){
                $indice=$i;
                $verifica=true;
            }
            $i++;
        }
        return $indice;
     }
     /*Implementar el método realizarVenta que recibe por parámetro con arreglos asociativos
    que contienen la siguiente información: código barra correspondiente a un producto y
    cantidad de ejemplares del producto  que desea venderse.  
    El procedimiento debe buscar los productos según el código de barra, verificar el 
    stock disponible y realizar el registro de la venta en caso de ser posible. 
    El procedimiento debe retornar un objeto Venta con los ítems correspondientes a 
    aquellos productos que se pudo vender*/

    public function realizarVenta($arregloAsociativo){
        $colVentas=$this->getColVentas();
        $codigoBarra=$arregloAsociativo["codigo barra"];
        $cantidad=$arregloAsociativo["cantidadAVender"];
        $producto=$this->buscarProducto($codigoBarra);
        if($producto!=-1){
            if($producto->getStock() >= $cantidad){}
                $numFactura=count($colVentas)+1;
                $fecha=date("Y");
                $unaVenta=new Venta($fecha,"consumidor final",$numFactura,"B");
                $nuevaVenta=$unaVenta->incorporarProducto($producto,$cantidad);
                array_push($colVentas,$nuevaVenta);
                $this->setColVentas($colVentas);
        }
        return $unaVenta;
    }
}


