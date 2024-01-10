<section class="section__slider">
    <a href="#" class="previos">&laquo;</a>
    <a href="#" class="next">&raquo;</a>
                       <a class="slider-slide active" href="">
                            <img class="sliderImg" src="assets/images/purplecat.png" alt="">
                        </a>
                        <a class="slider-slide" href="index.php?seccion=cita">
                            <img class="sliderImg" src="assets/images/slider_cita.png" alt="ddfd">
                        </a>
                        <a class="slider-slide" href="index.php?seccion=adopta">
                            <img class="sliderImg" src="assets/images/AdoptaPoster.png" alt="rrrrr">
                        </a>
</section>
<section class="container poster">   
<input type="hidden" id="home">
        <div class="poster__description">
            <div class="">
                <h1 class="poster__description--h1 poster__description--h1--canva"><span class="poster__description--span poster__description--h1--canva">M</span><span class="poster__description--span2 poster__description--h1--canva">undo</span><br>Canino</h1>
            </div>
            <img class="poster__img poster__img--menor" src="assets/images/lococatHome.png" alt="gato">
            <p class="poster__description--p">Nuestra clinica veterinaria ofrece sus productos  y servicios con calidad en la ciudad de Cucuta, contactanos y conocenos como trabajamos para la salud y  bienestar de tu mascota. </p>
            <div class="bottom">
                <a class="bottom" href="index.php?seccion=cita">Hacer una cita</a>
            </div>
        </div>
    <img class="poster__img poster__img--mayor" src="assets/images/lococatHome.png" alt="gato">
</section>
<?php
$cTextosProductos = <<<SQL
SELECT 
	*
FROM
    productos
 WHERE espacio=?
SQL;
$stmtProd = $pdo->prepare($cTextosProductos);
// Especificamos el fetch mode antes de llamar a fetch()
$stmtProd->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$dato_consulta = 'ad';
$stmtProd->execute([$dato_consulta]);
//$productos = $stmtProd->fetchAll();
//var_dump($productos);
?>
<section class="add">
    <h2 class="h2">!Ahorra con nuestras Ofertas¡</h2>
    <div class="add__container">
        <div class="carrusell">
<?php
$imagen_oferta = 'assets/iconos/oferta.png';
while ($rowProductos = $stmtProd->fetch()) {

    $precio = $rowProductos["precio"];
    $descuento = $rowProductos["descuento"];
    $img = $rowProductos["foto"];
    $id = $rowProductos["idproductos"];
?>
            <div class="add__container--box add__containerBox--width"   id="box1">
                <img class="oferta__descuento--img ad__oferta" src="<?php echo $imagen_oferta; ?>" alt="oferta">
                <p class="oferta__descuento ad__desc" >
                <?php echo $descuento;?></p>
                <span class="oferta__descuento--dto ad__span">D.to</span>
                <a href="index.php?seccion=producto&idProd=<?php echo $id; ?>" class="a__ad">
                
                    <img class="ad__img" src="admin/<?php echo $img; ?>" alt="imagenProducto">
                    <div class="add__containerBox--description">
                        <div class="add__containerBoxDescription">
                            <p class="add__containerBox--p">$<?php echo $precio; ?></p>
                        </div>
                    </div>
                </a>
            </div>
<?php
        };
?>
            <!-- <div class="add__container--box " id="box2">
            <a href="index.php?seccion=productos">
                <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                <div class="add__containerBox--description">
                    <div class="add__containerBoxDescription">
                        <p class="add__containerBox--p">$ 25.000</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="add__container--box " id="box3">
                <a href="index.php?seccion=productos">
                    <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                    <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                    <div class="add__containerBox--description">
                        <div class="add__containerBoxDescription">
                            <p class="add__containerBox--p">$ 25.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="add__container--box " id="box4">
                <a href="index.php?seccion=productos">
                    <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                    <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                    <div class="add__containerBox--description">
                        <div class="add__containerBoxDescription">
                            <p class="add__containerBox--p">$ 25.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="add__container--box " id="box5">
                <a class="a__Add" href="index.php?seccion=productos">
                    <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                    <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                    <div class="add__containerBox--description">
                        <div class="add__containerBoxDescription">
                            <p class="add__containerBox--p">$ 25.000</p>
                        </div>
                    </div>
                </a>
            </div>
                <div class="add__container--box " id="box6">
                    <a href="index.php?seccion=productos">
                        <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                        <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                        <div class="add__containerBox--description">
                            <div class="add__containerBoxDescription">
                                <p class="add__containerBox--p">$ 25.000</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="add__container--box " id="box7">
                    <a href="index.php?seccion=productos">
                            <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                            <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                            <div class="add__containerBox--description">
                                <div class="add__containerBoxDescription">
                                    <p class="add__containerBox--p">$ 25.000</p>
                                </div>
                            </div>
                    </a>
                    </div>
            <div class="add__container--box " id="box8">
                <a href="index.php?seccion=productos">
                    <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                    <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                    <div class="add__containerBox--description">
                        <div class="add__containerBoxDescription">
                            <p class="add__containerBox--p">$ 25.000</p>
                        </div>
                    </div>
                </a>
            </div>
                <div class="add__container--box " id="box9">
                    <a href="index.php?seccion=productos">
                        <img class="add__containerOfert--img" src="assets/images/20.png" alt="">
                        <img class="add__containerImg" src="assets/images/guacal.png" alt="">
                        <div class="add__containerBox--description">
                            <div class="add__containerBoxDescription">
                                <p class="add__containerBox--p">$ 25.000</p>
                            </div>
                        </div>
                    </a>
                </div> -->
            </div>
    </div>
</section>

<?php
$cTextosPreview = <<<SQL
SELECT 
	*
FROM
    publicaciones
WHERE categoria = :categoria 
OR  idpublicaciones =:id1
OR idpublicaciones =:id2
SQL;
$id1 = 54;
$id2 = 56;
$stmtpreview = $pdo->prepare($cTextosPreview);
// Especificamos el fetch mode antes de llamar a fetch()
$stmtpreview->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$stmtpreview->bindParam(':categoria', $categroia, PDO::PARAM_STR);
$stmtpreview->bindParam(':id1', $id1, PDO::PARAM_STR);
$stmtpreview->bindParam(':id2', $id2, PDO::PARAM_STR);
try {
    $stmtpreview->execute();
    //code...
} catch (\Throwable $th) {
    echo $th;
}
while ($rowpreview = $stmtpreview->fetch()){
    $tituloP = $rowpreview['titulo'];
    $descripcionP = $rowpreview['descripcion'];
    $idP = $rowpreview['idpublicaciones'];
?>
    <section class="container poster poster__vacunacion"> 
        <div class="poster__description">
            <h2 class="h2"><?php echo $tituloP; ?></h2>
            <p class="poster__description--p"><?php echo $descripcionP; ?></p>
            <div class="bottom bottom--orange">
                <a class="bottom bottom--orange" href="index.php?seccion=servicio&id=<?php echo $idP; ?>">Saber Mas</a>
            </div>
        </div>
    </section>
<?php
};
?>
<section>
    <div class="ifrem">
        <div>
            <h2 class="h2">Ubicanos</h2>
        </div>
           <div class="ifrem--box">
                <iframe  src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d988.0085736749793!2d-72.49630073050395!3d7.8914809995082065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwNTMnMjkuMyJOIDcywrAyOSc0NC40Ilc!5e0!3m2!1ses!2sco!4v1686268363796!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
</section>
