<?php

require "router/router.php";

// Handling the request
$method = $_SERVER['REQUEST_METHOD'];
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// server startes here
$router->start($method, $url);

