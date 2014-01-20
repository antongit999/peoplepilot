<?php 
   $json = json_encode($magazines);
    $json = str_replace("\/", "/",  $json); 
    echo $json;
?>