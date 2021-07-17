<?php



// path settings
$uri            = $_SERVER['REQUEST_URI'];
$uriApi         = explode('/api', $uri);
$apiSegments    = explode('/', $uriApi[1]);

$model          = $apiSegments[1];
$method         = $apiSegments[2];


//
include_once __DIR__ . '/../models/Component.php';
include_once __DIR__ . '/../../models/' . $model . '.php';
$myModel       = new $model($db);



// chiamo metodo richiesto
echo $myModel->$method();


?>
