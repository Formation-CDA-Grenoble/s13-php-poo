<?php

class Router {
    private $routes;

    public function __construct($filename = 'router.ini') {
        $data = parse_ini_file($filename);
        $this->routes = $data['routes'];
    }

    public function match(string $uri): ?array {
        foreach ($this->routes as $route => $controller) {
            if (preg_match('/^\/.+\/$/i', $route)) {
                if (preg_match($route, $uri, $matches)) {
                    $matches[0] = $controller;
                    return $matches;
                }
            } else {
                if ($uri === $route) {
                    return [$controller];
                }
            }
        }

        return null;
    }
}
