<?php

namespace app\controller;

use app\core\Controller;

class siteController extends Controller
{
    public function index(): string
    {
        return $this->view('_404');
    }
}