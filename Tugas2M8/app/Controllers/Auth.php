<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function auth()
    {
        // Placeholder for login logic
        // $email = $this->request->getPost('email');
        // $password = $this->request->getPost('password');
        
        return redirect()->to(base_url());
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        // Placeholder for registration logic
        // $data = $this->request->getPost();
        
        return redirect()->to(base_url('auth/login'))->with('message', 'Registrasi Berhasil');
    }
}
