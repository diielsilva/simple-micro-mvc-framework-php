<?php

class UserController extends Controller
{
    private string $controller;
    private string $method;
    private UserRepository $repository;

    public function __construct(string $controller = '', string $method = '')
    {
        $this->repository = new UserRepository();
        $this->controller = $controller == '' ? 'DashboardController' : $controller;
        $this->method = $method == '' ? 'index' : $method;
    }

    public function index(): void
    {
        $this->view('login');
    }

    public function attemptAuthenticate(array $params = []): void
    {

        if (!empty($_POST)) {
            extract($_POST);
        }

        if (isset($username) && isset($password)) {
            $user = $this->repository->findByUsername($username);
            if ($user != null) {
                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['signed'] = $username;
                }
            }
        }

        $this->redirect($this->controller, $this->method);
    }

    public function logout(): void
    {
        if (isset($_SESSION['signed'])) {
            unset($_SESSION['signed']);
        }

        $this->redirect('BasicController', 'index');
    }
}
