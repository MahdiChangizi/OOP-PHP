<?php

namespace app\controller;

use app\core\Controller;

class siteController extends Controller
{
    public function index()
    {
        return $this->view('_404');
    }
}