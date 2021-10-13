<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Document</title>

    <script>
        const addCarrito = (nombre,precio) => {
            document.getElementById("carrito").innerHTML+=`
                <p>${nombre}</p>
                <p>${precio}</p>
            `
            showCarrito();
        }

        const closeCarrito = () => {
            document.getElementById("carrito").style.width="0";
        }

        const showCarrito = () => {
            document.getElementById("carrito").style.width="250px";
        }
    </script>

</head>

<body>
    <?php
        include("API/getProducts.php");

        $products = $result->fetch_all();
    ?>

    <div class="container">
        <div class="row">
            <?php
                foreach ($products as $product){
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-0 cajas-productos">
                        <div class="item col-xs-12 p-0 pt-4 m-3 "> 
                            <img src="<?php echo $product[2]?>" alt="<?php echo $product[1]?>" class="card-img-top img-responsive img-product">
                            <div class="nombre-producto">
                               <h6  style="font-size:18px;"><?php echo $product[1];?></h6>
                               <h6 class="precio"><?php echo $product[3]." €"?></h6>
                            </div>
                            <div>
                                <button onclick="addCarrito('<?php echo $product[1]?>', '<?php echo $product[3]?>')" class="btn-addCarrito btn">Añadir al carrito</button>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
            
        </div>
    </div>
    <div>
        <button onclick="showCarrito()">Open</button>
    </div>
    <div id="carrito">
        <button onclick="closeCarrito()">X</button>
    </div>
            



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>