<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function processBooking()
    {
        // Placeholder for booking process
        return redirect()->to(base_url())->with('message', 'Booking Berhasil');
    }
}
