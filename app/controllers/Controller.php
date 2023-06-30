<?php

abstract class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);
        $file = BASE_PATH . "/public/views/$view.php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            throw new Exception("View not found!");
        }
    }

    protected function redirect(string $ctrl, string $mtd): void
    {
        header("Location: http://localhost/framework/public/?ctrl=$ctrl&mtd=$mtd");
    }
}
