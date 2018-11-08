<?php
/* 
*  Selector de color
*
*  Parámetros de ejecuci�n:
*  Vacío                 = Muestra una banda de selección de color rojo
*  r=ROJO                = Muestra la banda de selección de rojo y un cuadro con variaciones de azul y verde siendo rojo=ROJO
*  r=ROJO&g=VERDE&b=AZUL = Muestra la banda del rojo, el cuadro de azul y verde y un div con el color seleccionado (ROJO,VERDE,AZUL)
*/ ?>

<html>
    <head>
        <style>
            .cuadro{width:20px;height:20px;float:left}
            .cuadrosel{width:100px;height:50px;position:absolute;left:700px;top:20px;padding:5px}
            .select{border:solid 2px}
            .salto{clear:left}
        </style>
    </head>    
    <body>
<?php
       
if(isset($_GET['r']))
    $rojo=$_GET['r'];
if(isset($_GET['g']))
    $verde=$_GET['g'];
if(isset($_GET['b']))
    $azul=$_GET['b'];

// Banda de selecci�n de color rojo
for($r=0;$r<=255;$r+=8){
    if(isset($rojo) && ($r==$rojo)) 
        $class2='select';
    else 
        $class2='';
    $link="r=$r";
    if(isset($verde) && isset($azul)) $link.="&g=$verde&b=$azul";;
    echo "<a href='?$link'>
         <div class='cuadro $class2' style='background-color:rgb($r,0,0)'>
         </div>
         </a>";
}
?>
<div class='salto'></div>
<p>
<?php
if(isset($rojo)){
    // Cuadrado de selecci�n de azul y verde, con el rojo fijo
    for($b=0;$b<=255;$b+=16){
        for($g=0;$g<=255;$g+=8){
            echo "<a href=?r=$rojo&g=$g&b=$b>";
            echo "<div class='cuadro' style='background-color:rgb($rojo,$g,$b)'>
                  </div>";
            echo "</a>";
        }
        echo "<div class=salto></div>";
    }
    // Div del color seleccionado : rojo,verde,azul    
    if(isset($verde) && isset ($azul)){
            echo "<div class=cuadrosel style='background-color:rgb($rojo,$verde,$azul)'> "
                    . "$rojo,$verde,$azul</div>";
    }
}
?>
</body>
</html>


