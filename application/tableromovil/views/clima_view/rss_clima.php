<?php
$placename = 'buenos aires'; // city where you want local weather
$place=urlencode($placename); //Esta función es conveniente cuando se codifica una cadena a ser usada como la parte de consulta de una URL
$place = utf8_encode($place);
$lang = 'es';
$url = 'http://www.google.com/ig/api?weather='.$place.',$&hl='.$lang.'';
$ch = curl_init(); // Inicia sesión cURL

//curl_setopt configura una opción para una transferencia cURL
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); // TRUE para devolver el resultado de la transferencia como string del valor de curl_exec() en lugar de mostrarlo directamente.
curl_setopt ($ch, CURLOPT_URL, $url); // dirección URL a capturar
curl_setopt ($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // Contenido del header "User-Agent: " a ser usado en la petición HTTP.
curl_setopt ($ch, CURLOPT_TIMEOUT, 60); // numero máximo permitido xra ejecutar funciones cURL
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); //para seguir cualquier encabezado "Location: " 
$raw_data = curl_exec ($ch); // Ejecuta la sesión cURL que se le pasa como parámetro.
curl_close ($ch);

$xml = simplexml_load_string($raw_data); //Interpreta un string de XML en un objeto
$condition = $xml->weather->current_conditions->condition['data'];
$temp_c = $xml->weather->current_conditions->temp_c['data'];
$humidity = $xml->weather->current_conditions->humidity['data'];
$icon = $xml->weather->current_conditions->icon['data'];

//echo $xml->weather->current_conditions->icon['data'];
 
//echo ("<h1>Local weather for $placename</h1>");
 
/* Pronóstico Extendido */ /*
for ($i = 0; $i < count($xml->weather->forecast_conditions); $i++){
 $data = $xml->weather->forecast_conditions[$i];
 $day_of_week = $data->day_of_week['data'];
 $low = $data->low['data'];
 $high = $data->high['data'];
 $condition = $data->condition['data'];
 $day_of_week = utf8_decode($day_of_week);
 $img = 'http://img0.gmodules.com/' . $data->icon['data'];
 echo ("$day_of_week<br/><img src=\"$img\"/>$low&#176;|$high&#176;<br/>$condition<br/><br/>");
}*/
echo "<p>".$placename."</p>";
//for ($i = 0; $i < count($xml->weather->forecast_conditions); $i++){
 $data = $xml->weather->forecast_conditions[0];
 $day_of_week = $data->day_of_week['data'];
 $low = $data->low['data'];
 $high = $data->high['data'];
 $condition = $data->condition['data'];
 $day_of_week = utf8_decode($day_of_week);
 $img = 'http://img0.gmodules.com/' . $data->icon['data'];
 echo ("$day_of_week<br/><img src=\"$img\"/>$low&#176;|$high&#176;<br/>$condition<br/><br/>");
//}

?>