<?php 
define ("DIRIMAGES","images/");

/** Muestra una lista de imagenes
 * Si chkdelete es true, muestra un check para seleccionarla. Si no, un campo hidden
 */
function verImagenes($images,$chkdelete=true) {
    echo '<div class="row justify-content-center">';
    foreach ($images as $image) {
        $info=getimagesize( DIRIMAGES.$image);
        $bytes=filesize(DIRIMAGES.$image);
        echo "<div class='card' style='width: 200px'><div>";
        if ($chkdelete) {
            echo "<input type='checkbox' class=chk name='images[]' value='$image'>";
            echo " <a href='resize.php?f=$image'><i class='fa fa-compress'></i></a></div>";
        } else 
            echo "<input type='hidden' name='images[]' value='$image'></div>";
        echo "<small>$info[0]x$info[1] ($bytes)</small> ";
        echo "<a href='".DIRIMAGES.$image."'>
            <img class='card-img-top' src='".DIRIMAGES.$image."'>
            </a>";

        echo "</div>";

    }
   echo "</div>";

}

function borraImagenes($images){
    foreach($images as $image) {
        if(strpos($image,'..')!==false) continue; //Protege directorios superiores
        if (is_writable(DIRIMAGES.$image)) {
            if(!unlink(DIRIMAGES.$image))
                echo "Error al borrar ".$image;
        } else 
            echo "Error en la imagen ".$image;
    }

}

/** Redimensiona una imagen y escribe una "marca de agua" en ella si se le pasa $texto
 * 
 */
function resize($file, $w, $h,$texto='') {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($w/$h > $r) {
        $newwidth = $h*$r;
        $newheight = $h;
    } else {
        $newheight = $w/$r;
        $newwidth = $w;
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    if($texto){
        $color = imagecolorallocate($dst, 255, 0, 0);
        $ret=imagestring($dst, 2, 1, 1, $texto, $color);
    }

    imagejpeg($dst, $file);
}
