<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function auth()
    {
        // Placeholder for authentication logic
        // $username = $this->request->getPost('username');
        // $password = $this->request->getPost('password');
        
        // For now, just redirect back or to dashboard
        return redirect()->to(base_url('admin/kamar/create'));
    }

    public function createKamar()
    {
        return view('admin/kamar/create');
    }

    public function storeKamar()
    {
        // Placeholder for storing room data
        // $data = $this->request->getPost();
        // $file = $this->request->getFile('gambar_ruangan');
        
        return redirect()->to(base_url('admin/kamar/create'))->with('message', 'Data Kamar Berhasil Disimpan');
    }

    public function createFasilitas()
    {
        return view('admin/fasilitas/create');
    }

    public function storeFasilitas()
    {
        // Placeholder for storing facility data
        // $data = $this->request->getPost();
        
        return redirect()->to(base_url('admin/fasilitas/create'))->with('message', 'Fasilitas Berhasil Disimpan');
    }
}
