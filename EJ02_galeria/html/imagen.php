<?php 
$info=getimagesize( DIRIMAGES.$image);
$bytes=filesize(DIRIMAGES.$image);
?>
<div class='card' style='width: 200px'><div>

    <?php
    if ($chkdelete) {
        echo "<input type='checkbox' class=chk name='images[]' value='$image'>";
        echo " <a href='resize.php?f=$image'><i class='fa fa-compress'></i></a></div>";
    } else 
        echo "<input type='hidden' name='images[]' value='$image'></div>";
    ?>

    <small><?= "$info[0]x$info[1] ($bytes)"; ?></small>
    <a href='<?= DIRIMAGES.$image ?>'>
        <img class='card-img-top' src='<?=DIRIMAGES.$image?>'>
    </a>
</div>
