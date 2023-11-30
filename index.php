<?php
require "./lib/routers.php";

$router = new Router();

// function users()
// {
//     echo "users page this is users";
// }


$router->Route('GET', '/api/users', "users");
// $router->Route('POST', '/api/users', 'UserController@store');
// Add more routes as needed


$router->handleRequest($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
