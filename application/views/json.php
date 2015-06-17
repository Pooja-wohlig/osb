<?php 

$http_origin = $_SERVER['HTTP_ORIGIN'];

header('Access-Control-Allow-Headers: Content-Type');

header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Origin: $http_origin");
        header('Access-Control-Max-Age: 86400');


echo json_encode($message);
?>