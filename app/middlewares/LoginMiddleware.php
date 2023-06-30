<?php

class LoginMiddleware extends Controller
{
    private string $controller;
    private string $method;
    private array $protectedUrls;

    public function __construct(string $controller, string $method, array $protectedUrls = [])
    {
        $this->controller = $controller;
        $this->method = $method;
        $this->protectedUrls = $protectedUrls;
    }

    public function isSigned(string $ctrl): void
    {
     
        foreach ($this->protectedUrls as $url) {
            if ($url === $ctrl) {
                if (empty($_SESSION) || !isset($_SESSION['signed'])) {
                    $this->redirect($this->controller, $this->method);
                    return;
                }
            }
        }
    }
}
