<?php 

#Obtenemos los datos del clima (condición, temperatura, humedad, vientos) de una ciudad determinada
$url = "http://www.google.com/ig/api?weather=lima&hl=es";

#file_get_contents devuelve el archivo a un string
$contents = file_get_contents($url);


?>