<?php


// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// data
$GLOBALS['RECEIVED_DATA'] = json_decode(file_get_contents('php://input'), true);


/*
Config file
This files incluse some basic configuration infos.
Here you can set database infos, user and admin auth infos, etc.
*/
include_once __DIR__ . '/../config.php';


/*
Reply component
This component let the application reply to the request in a simple way.
*/
include_once __DIR__ . '/components/reply.php';


/*
Auth component
This component has the role to check use rauthentication and create 2 level of permsission:
- Admin
- Simple user
*/
include_once __DIR__ . '/components/auth.php';


/*
Database component
This simple component create a connection with the database.
*/
include_once __DIR__ . '/components/database.php';


/*
Router component
This component create a routing system to get request and reply with the right response.
*/
include_once __DIR__ . '/components/router.php';


?>
