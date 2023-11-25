<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct() {
        
    }

    public function index()
    {
        if (session()->login != true) {
            return redirect()->to(base_url() . '/')->with('error', 'Silahkan login terlebih dahulu!');
        }

        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard', $data);
    }
}
