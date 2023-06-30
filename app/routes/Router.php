<?php

final class Router
{
    private function __construct()
    {
    }

    public static function route(LoginMiddleware $middleware): void
    {
        session_start();
        $controller = $_GET['ctrl'] ?? 'BasicController';
        $method = $_GET['mtd'] ?? 'index';
        $params = $_GET;

        $middleware->isSigned($controller);
        $controller = new $controller();
        $controller->$method($params);
    }
}
