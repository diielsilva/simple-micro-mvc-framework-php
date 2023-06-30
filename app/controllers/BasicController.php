<?php

class BasicController extends Controller
{
    public function index(): void
    {
        $this->view('home');
    }

    public function error(): void
    {
        $this->view('error');
    }
}
