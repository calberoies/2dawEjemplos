<?php 
define ("DIRIMAGES","images/");

/*
* Borra una lista de imagenes. Devuelve la lista de errores, si los hay 
*/
function borraImagenes($images){
    $err=[];
    foreach($images as $image) {
        if(strpos($image,'..')!==false) continue; //Protege directorios superiores
        if (is_writable(DIRIMAGES.$image)) {
            if(!unlink(DIRIMAGES.$image))
                $err[$image]="Error al borrar ".$image;
        } else 
            $err[$image]= "Error en la imagen ".$image;
    }
    return $err;
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
