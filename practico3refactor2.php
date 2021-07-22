<?php

const SIN_STOCK = 'out_of_stock';


/**
 *param array $arrayToPrint
 *param string $title
 */

/* 
function printArrayValues(array $arrayToPrint, string $title=null, bool $order=true){//Le pasamos que titulo puede ser null y otro parametro orden y le asignamos por defecto true
    if ($title) echo "<h2>$title</h2>";// Aca le decimos que si titulo que haga esto
    if ($order) sort($arrayToPrint);// Si orden que haga esto
    foreach($arrayToPrint as $item){
        echo"<span>$item</span>";
        echo "<br>";
    }
}
*/

$file = fopen('product_v1.csv', 'r');

$line = fgets($file);

while ($line = fgetcsv($file, 0, ';')) {
    $productos[]= [
        "product_id"        => $line[0],
        "product_sku"       => $line[1],
        "product_name"      => $line[2],
        "product_inventory" => $line[3],
        "category_id"       => $line[4],
        "category_name"     => $line[5]
    ];
}


// Consigna
// 1) Listado de categorias (nombre)
// 2) Listado de los productos sin stock
// 3) Listado de productos por categorias

//1)
$productosSinStock = [];
$productosPorCategoria = [];

foreach($productos as $producto) {
    // Separo productos sin stock
    if($producto['product_inventory'] == SIN_STOCK){
        $productosSinStock[] = $producto;
    }
    $productosPorCategoria[$producto['category_name']][] = $producto;
}
// Anteriormente recorriamos varias veces el mismo array, haciendo varias cosas.
// Ahora colocamos todo en un mismo array y separo en distintos array todo lo que nos hace falta.


//printArrayValues(array_keys($productosPorCategoria), 'Categorias'); // Le pasamos a la función el resultado de array_keys


//2)
/*
echo '<h3>Productos sin stock</h3>';
foreach($productos as $producto){
    echo "Producto :($producto[product_sku]) $producto[product_name]";
    echo '<br>';
}

//3)

echo '<br>';

foreach($productosPorCategoria as $nombreCategoria => $categoriaProductos){
    
    echo "Categoria: $nombreCategoria <br>";
       
    foreach($categoriaProductos as $prod){
        echo "($prod[product_sku]) $prod[product_name]";
        echo '<br>';
    }
       
    echo '<br>';
}
*/