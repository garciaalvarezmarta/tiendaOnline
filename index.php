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
        let precioTotal = 0;

        const addCarrito = (nombre, precio, img) => {
            document.getElementById("productos-carrito").innerHTML += `
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
            document.getElementById("carrito").style.right = "-270px";
        }

        const showCarrito = () => {
            document.getElementById("carrito").style.right = "0";
            if (precioTotal > 0) {
                document.getElementById("container-btn-comprar").innerHTML = `
                <button class="btn btn-outline-primary btn-comprar">Comprar</button>
                `;
            } else {
                document.getElementById("container-btn-comprar").innerHTML = `
                    <p>Tu cesta está vacía</p>
                `;
            }
        }

        const calcularTotal = (precio) => {
            precioTotal += parseFloat(precio);;
            document.getElementById("mostrar-precio").innerHTML = `${precioTotal} €`
        }

        async function getMakeup(){
            let response = await fetch('https://makeup-api.herokuapp.com/api/v1/products.json');
            let data = await response.json();
            return data;
        } 

        
        
    </script>

</head>

<body>
    <?php
    include("API/getProducts.php");
    session_start();
    if(isset($_SESSION['usuario'])){
        $products = $result->fetch_all();
    ?>

    <nav class="nav  navbar-expand-lg ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="bi bi-justify"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav-container navbar-nav">
                <li class="nav-elements nav-item">
                    <a href="">Inicio</a>
                </li>
                <li class="nav-elements nav-item">
                    <a href="#maquillaje">Maquillaje</a>
                </li>
                <li class="nav-elements nav-item">
                    <a href="#accesorios">Accesorios de maquillaje</a>
                </li>
                <li class="nav-elements nav-item">
                    <a href="#cosmetica">Cosmética</a>
                </li>
            </ul>
        </div>
        <div id="carrito-icon" onclick="showCarrito()">
            <i class="bi bi-cart"></i>
        </div>
    </nav>

    <div id="carouselExampleControls" class="carousel slide d-none d-sm-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://d10qoa1dy3vloz.cloudfront.net/resized/840x/slots-img/cat/category_makeup_2_840x400-1nea3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://d10qoa1dy3vloz.cloudfront.net/resized/840x/slots-img/cat/category_makeup_2_840x400-1nea3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://d10qoa1dy3vloz.cloudfront.net/resized/840x/slots-img/cat/category_makeup_2_840x400-1nea3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row" id="maquillaje">
            <?php
            foreach ($products as $product) {
                if($product[4]=='0'){
            ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-0 cajas-productos">
                    <div class="item col-xs-12 p-0 pt-4 m-3 ">
                        <img src="<?php echo $product[2] ?>" alt="<?php echo $product[1] ?>" class="card-img-top img-responsive img-product">
                        <div class="nombre-producto">
                            <h6 style="font-size:18px;"><?php echo $product[1]; ?></h6>
                            <h6 class="precio"><?php echo $product[3] . " €" ?></h6>
                        </div>
                        <div>
                            <button onclick="addCarrito('<?php echo $product[1] ?>', '<?php echo $product[3] ?>', '<?php echo $product[2] ?>')" class="btn-addCarrito btn">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            <?php }
            }
            ?>

        </div>

        <div class="row" id="accesorios">
            <?php
            foreach ($products as $product) {
                if($product[4]=='1'){
            ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-0 cajas-productos">
                    <div class="item col-xs-12 p-0 pt-4 m-3 ">
                        <img src="<?php echo $product[2] ?>" alt="<?php echo $product[1] ?>" class="card-img-top img-responsive img-product">
                        <div class="nombre-producto">
                            <h6 style="font-size:18px;"><?php echo $product[1]; ?></h6>
                            <h6 class="precio"><?php echo $product[3] . " €" ?></h6>
                        </div>
                        <div>
                            <button onclick="addCarrito('<?php echo $product[1] ?>', '<?php echo $product[3] ?>', '<?php echo $product[2] ?>')" class="btn-addCarrito btn">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            <?php }
            }
            ?>

        </div>

        <div class="row" id="cosmetica">
            <?php
            foreach ($products as $product) {
                if($product[4]=='2'){
            ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 p-0 cajas-productos">
                    <div class="item col-xs-12 p-0 pt-4 m-3 ">
                        <img src="<?php echo $product[2] ?>" alt="<?php echo $product[1] ?>" class="card-img-top img-responsive img-product">
                        <div class="nombre-producto">
                            <h6 style="font-size:18px;"><?php echo $product[1]; ?></h6>
                            <h6 class="precio"><?php echo $product[3] . " €" ?></h6>
                        </div>
                        <div>
                            <button onclick="addCarrito('<?php echo $product[1] ?>', '<?php echo $product[3] ?>', '<?php echo $product[2] ?>')" class="btn-addCarrito btn">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
            <?php }
            }
            ?>

        </div>
    </div>

    <div id="carrito">
        <i class="bi bi-x-circle close-icon" onclick="closeCarrito()"></i>
        <br />
        <hr />
        <div id="productos-carrito"> </div>

        <div class="precio-total">Total <span id="mostrar-precio" style="float: right;">0 €</span></div>
        <div style="text-align: center" id="container-btn-comprar">
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

            <script>
                let data = getMakeup();
                document.getElementById("accesorios").innerHTML+=data[0];</script>

<?php
    }else{
        header('Location:login.php');
    }
?>

</body>

</html>