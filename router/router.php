<?php
require "lib/routers.php";

$router = new Router();

// Define routes
$router->get('/', 'home');


function home(){
    echo "home page";
}