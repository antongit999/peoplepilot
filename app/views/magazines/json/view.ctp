<?php 
$json = json_encode($magazine);
$json = str_replace("\/", "/",  $json); 
echo $json;
?>