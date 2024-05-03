<?php
include 'Producto.php';
include 'Item.php';
include 'Venta.php';
include 'Tienda.php';


//Crear  una colección con un mínimo de 4 productos, uno de los productos tiene como 
//código de barra 0001 y cantidad stock 3.
//código barra, marca, color, talle, descripción y cantidad en stock.
$objProducto1=new Producto("0001","nike","azul","42","zapatillas deportivas",3);
$objProducto2=new Producto("0002","adidas","blanca","L","remera",5);
$objProducto3=new Producto("0003","new balace","naraja","M","campera deportiva",2);
$objProducto4=new Producto("0004","nike","negra","s","pantalones",7);
$colProductos=[$objProducto1,$objProducto2,$objProducto3,$objProducto4];
//nombre, dirección, teléfono, la colección de productos y la colección de ventas realizadas
$colVentas=[];
$objTienda= new Tienda("dexter","Av.Argentina 452","29933333",$colProductos,$colVentas);