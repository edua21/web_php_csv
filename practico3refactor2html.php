<?php 
    include_once 'practico3refactor2.php';
    $categorias = array_keys($productosPorCategoria);
    sort($categorias);
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Productos</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Hello, world</h1>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#actividad1">Actividad 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#actividad2">Actividad 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#actividad3">Actividad 3</a>
                    </li>
                    </ul>

                    <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="actividad1">
                        <h3 class="card-title">Categorias</h3>
                        <ul class="list-group">
                            <?php foreach ($categorias as $categoria) : ?>
                                <li class="list-group-item"><?php echo $categoria?></li>
                            <?php endforeach; ?>
                        </ul>            
                    </div>
                    <div class="tab-pane container fade p-5" id="actividad2">
                        <h3>Productos sin stock</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sku</th>
                                <th scope="col">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productosSinStock as $producto) : ?>
                                    <tr>
                                    <th scope="row"><?php echo $producto['product_id']; ?></th>
                                    <td><?php echo $producto['product_sku']; ?></td>
                                    <td><?php echo $producto['product_name']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane container fade p-5" id="actividad3">
                        <div class="accordion" id="accordionExample">
                            <?php foreach($productosPorCategoria as $categoria => $listaProducto) : ?>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo str_replace(' ', '', $categoria); ?>"  aria-controls="collapseOne">
                                        <?php echo $categoria.' ('.count($listaProducto).')'; ?>
                                        </button>
                                        </h5>
                                    </div>

                                    <div id="<?php echo str_replace(' ', '', $categoria); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Sku</th>
                                                <th scope="col">Nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listaProducto as $producto) : ?>
                                                    <tr>
                                                    <th scope="row"><?php echo $producto['product_id']; ?></th>
                                                    <td><?php echo $producto['product_sku']; ?></td>
                                                    <td><?php echo $producto['product_name']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>