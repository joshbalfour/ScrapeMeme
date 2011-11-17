<?php
header('Content-type: image/jpg');
$image=$_GET['img'];
$image2=file_get_contents($image);
echo $image2;
?>