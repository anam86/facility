<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->login == true) {
            return redirect()->to(base_url() . '/dashboard');
        }

        return view('auth/login');
    }

    public function temp_login()
    {
        $reqUsername = $this->request->getVar('username');
        $reqPassword = $this->request->getVar('password');

        if (!$this->validate([
            'username'  => 'required',
            'password'  => 'required'
        ])) {
            return redirect()->to(base_url() . '/')->with('error', 'Username atau Password tidak boleh kosong!');
        };

        $dataUser    = $this->user->getUserbyUsername($reqUsername);
        if ($dataUser) {
            $verifPassword = password_verify($reqPassword, $dataUser->password);
            if ($verifPassword) {
                $sessionData = [
                    'username'  => $dataUser->username,
                    'email'     => $dataUser->email,
                    'group'     => $dataUser->id_group,
                    'login'     => true
                ];

                session()->set($sessionData);
                return redirect()->to(base_url() . '/dashboard')->with('success', 'Selamat Datang.');
            } else {
                return redirect()->to(base_url() . '/')->with('error', 'Username atau Password Salah!');
            }
        } else {
            return redirect()->to(base_url() . '/')->with('error', 'User tidak terdaftar!');
        }
    }

    public function lupa_password()
    {
        return view('auth/lupa_password');
    }

    public function temp_logout()
    {
        session()->destroy();
        return redirect()->to(base_url() . '/');
    }
}
