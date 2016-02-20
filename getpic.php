<?php

$image = $_GET['q'];


$imageData = base64_encode(file_get_contents($image));

$src = 'data: '.mime_content_type($image).';base64,'.$imageData;
//echo $src;
echo '<img src="'.$src.'"';
echo '" height="50" width="50"/>'."</br>";
//</br><input type='submit' value='Submit'/>";



?>