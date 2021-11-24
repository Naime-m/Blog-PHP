<?php
if(isset($_GET['path']))
{

$url = $_GET['path'];


clearstatcache();


if(file_exists($url)) {


header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($url).'"');
header('Content-Length: ' . filesize($url));
header('Pragma: public');


flush();


readfile($url,true);


exit();
}
else{
echo "Le chemin du fichier n'existe pas.";
}
}
echo "Le chemin du fichier n'est pas défini."

?>