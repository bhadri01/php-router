<?php declare(strict_types=1);
class Router
{
    private $routes = [];

    public function Route($method, $path, $handler)
    {
        $this->routes[$method][$path] = $handler;
    }

    public function handleRequest($method, $path)
    {
        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            if (is_callable($handler)) {
                $handler(); // Execute the passed function
            } else {
                $this->renderView($handler); // Display view for custom pages
            }
        } else {
            $this->renderErrorPage(); // Handle 404 or other errors
        }
    }

    private function renderView($view)
    {
        include('views/' . $view . '.php');
    }

    private function renderErrorPage()
    {
        include('views/404.php');
        exit();
    }
}
