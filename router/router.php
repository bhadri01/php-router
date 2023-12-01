<?php
require "lib/server.php";
foreach (glob('src/*.php') as $file) {
    require_once $file;
}

$router = new Router();

// Define routes
$router->get('/', 'home');

function home()
{
   response(array("message" => "this is the root of the project", "status" => true), 200);
}
