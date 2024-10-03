<?php

class HomeController extends Controller
{
    public function index()
    {
        // Carregar a view da página inicial
        $this->view('home/index');
    }
}
