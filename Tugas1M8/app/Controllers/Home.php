<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard - Best Hotel',
            'page'  => 'home'
        ];
        return view('dashboard', $data);
    }
}
