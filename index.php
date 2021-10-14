<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Document</title>

    <script>
        let precioTotal=0;

        const addCarrito = (nombre,precio,img) => {
            document.getElementById("productos-carrito").innerHTML+=`
                <div class="content-carrito">
                    <img src="${img}" alt="" class="img-carrito">
                    <p>${nombre}</p>
                    <p id="precio-carrito">${precio} €</p>
                </div>
                <hr/>   
            `
            calcularTotal(precio);
            showCarrito();

        }

        const closeCarrito = () => {
            document.getElementById("carrito").style.right="-270px";
        }

        const showCarrito = () => {
            document.getElementById("carrito").style.right="0";
            if(precioTotal > 0){
                document.getElementById("container-btn-comprar").innerHTML=`
                <button class="btn btn-outline-primary btn-comprar">Comprar</button>
                `;
            }
            else{
                document.getElementById("container-btn-comprar").innerHTML=`
                    <p>Tu cesta está vacía</p>
                `;
            }
        }

        const calcularTotal = (precio) =>{
            precioTotal+=parseFloat(precio);;
            document.getElementById("mostrar-precio").innerHTML=`${precioTotal} €`
        }
    </script>

</head>

<body>
    <?php
        include("API/getProducts.php");

        $products = $result->fetch_all();
    ?>
    <div class="nav">
        <ul class="nav-container">
            <li  class="nav-elements">
                <a href="">Inicio</a>
            </li>
            <li  class="nav-elements">
                <a href="">Maquillaje</a>
            </li>
            <li  class="nav-elements">
                <a href="">Accesorios de maquillaje</a>
            </li>
            <li  class="nav-elements">
                <a href="">Cosmética</a>
            </li>
            <li  class="nav-elements" id="carrito-icon"  onclick="showCarrito()">
                <i class="bi bi-cart"></i>
            </li>
        </ul>  
    </div>
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
                                <button onclick="addCarrito('<?php echo $product[1]?>', '<?php echo $product[3]?>', '<?php echo $product[2]?>')" class="btn-addCarrito btn">Añadir al carrito</button>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
            
        </div>
    </div>

    <div id="carrito">
        <i class="bi bi-x-circle close-icon" onclick="closeCarrito()"></i>
        <br/>
        <hr />  
        <div id="productos-carrito"> </div>

        <div class="precio-total">Total <span id="mostrar-precio" style="float: right;">0 €</span></div>
        <div style="text-align: center" id="container-btn-comprar">
        </div>

    </div>
            



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>