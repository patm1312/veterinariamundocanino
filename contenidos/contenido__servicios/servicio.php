
<?php
if(isset($_GET['id'])){
    if(!empty($_GET['id'])){

        $cTextos = <<<SQL
SELECT 
	*
FROM
    publicaciones
WHERE idpublicaciones = ?
SQL;
$id = $_GET['id'];
$stmt = $pdo->prepare($cTextos);
// Especificamos el fetch mode antes de llamar a fetch()
$stmt->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
try {
    $stmt->execute([$id]);

    //code...
} catch (\Throwable $th) {
    echo $th;
}
$cTextosPs = <<<SQL
SELECT 
	*
FROM
    PServicio
WHERE publicaciones_idpublicaciones = ?
SQL;
$stmtPs = $pdo->prepare($cTextosPs);
// Especificamos el fetch mode antes de llamar a fetch()
$stmtPs->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
try {
    $stmtPs->execute([$id]);

    //code...
} catch (\Throwable $th) {
    echo $th;
}
    }else{

    }
}else{

}
?>

<section class="container container__block">
    <input type="hidden" id="producto">
    <?php
$cadenaT;
$letra1 ;
            while ($row = $stmt->fetch()){ 
                $titulo = $row['titulo'];
                $trimmed = trim($titulo);
                $array = str_split($trimmed, 1);
                $bol = true;
                foreach ($array as $key ) {
                    if($bol == true){
                        $letra1 = $key;
                        $bol = false;
                    }else{
                    $cadenaT .= $key;
                    }
                }
        ?>
            <div class="poster__description">
                <h1 class="poster__description--h1 poster__description--h1--canva"><span class="poster__description--span poster__description--h1--canva"><?php echo $letra1; ?></span><span class="poster__description--span2 poster__description--h1--canva"><?php echo $cadenaT; ?></span><br></h1>
                <div class="publicacion">
                    <div class="foto__producto responsiveDiv">
                        <img class="foto" src="admin/<?php echo $row['foto']; ?>" alt="imagen">
                        
                    </div>
                    <p class="poster__description--p"><?php echo $row['descripcion']; ?></p>
                </div>
            </div>
            <?php
            $titulo;
            $subtitulo;
            $foto;
            $parrafo;
            if($stmtPs){
                try {
                    $rowPs = $stmtPs->fetch();
                    //var_dump($rowPs);
                } catch (\Throwable $th) {
                    echo $th;
                }
                foreach ($rowPs as $key => $value) {
                    $titulo =  $rowPs['titulo'];
                    $subtitulo=  $rowPs['subtitulo'];
                    $foto =  $rowPs['imagen'];
                    $parrafo =  $rowPs['parrafo'];
                   
                };
                if($rowPs > 0){
            
                
            ?>
          
                    <article class="container container__block">
                        <h2 class="h2 line__down"><?php echo $titulo; ?></h2>
                                <h2 class="h2--servicios "><?php echo $subtitulo; ?></h2>
                        <div class="producto">   
                            <div class="foto__producto responsiveDiv foto__servicio">
                                    <img class="foto" src="admin/<?php echo $foto; ?>" alt="imagen">
                            </div> 
                            <div class="descripcion__producto">  
                                <p><?php echo $parrafo ?></p>
                            </div>
                        </div>
                    </article>
                <?php
                };
                ?>

<?php

            };
?>
            </section>
<?php

        };
?>
