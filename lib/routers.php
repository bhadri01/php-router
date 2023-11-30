<?php

declare(strict_types=1);

class Router
{
    private $routes = [];

    public function get($path, $handler)
    {
        $this->routes["GET"][$path] = $handler;
    }

    public function post($path, $handler)
    {
        $this->routes["POST"][$path] = $handler;
    }

    public function put($path, $handler)
    {
        $this->routes["PUT"][$path] = $handler;
    }

    public function delete($path, $handler)
    {
        $this->routes["DELETE"][$path] = $handler;
    }

    public function patch($path, $handler)
    {
        $this->routes["PATCH"][$path] = $handler;
    }

    public function route($method, $path, $handler)
    {
        $this->routes[$method][$path] = $handler;
    }

    public function start($method, $path)
    {
        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            if (is_callable($handler)) {
                $handler(); // Execute the passed function
            } else {
                $this->renderPage($handler); // Display view for custom pages
            }
        } else {
            $this->renderErrorPage(); // Handle 404 or other errors
        }
    }

    private function renderPage($view)
    {
        include('views/' . $view . '.php');
    }

    private function renderErrorPage()
    {
        include('views/404.php');
        exit();
    }
}
