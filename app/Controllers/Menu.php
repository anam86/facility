<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Menu extends BaseController
{
    public function index()
    {
        if (session()->login != true) {
            return redirect()->to(base_url() . '/')->with('error', 'Silahkan login terlebih dahulu!');
        }

        $menu = $this->menu->getMenubyName('Menu');
        $data = [
            'title' => 'Menu',
            'menus' => $this->menu->getAll(),
            'gmenu' => $this->gmenu->getGroupmenubyFKey(session()->group, $menu->id)
        ];

        return view('master_data/menu/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Menu',
            'subtitle'   => 'Create',
            'active'     => 'active',
            'validation' => $this->validation
        ];

        return view('master_data/menu/create', $data);
    }
    
    public function store()
    {
        if (!$this->validate([
			'nama_menu' => [
                'rules'  => 'required|min_length[2]|alpha_numeric_punct|is_unique[menus.nama_menu]',
                'errors' => [
                    'required'            => 'Nama Group tidak boleh kosong!',
                    'min_length'          => 'Nama Group minimal 2 huruf!',
                    'alpha_numeric_punct' => 'Nama Group tidak boleh menggunakan karakter khusus kecuali (~, !, #, $, %, &, *, -, _, +, =, |, :, dan .)!',
                    'is_unique'           => 'Nama Group sudah terdaftar!',
                ]
			]
        ])) {
            return redirect()->to(base_url().'/menu/create')->withInput();
        }

        $data = $this->request->getVar();
        try {
            $id_menu = $this->menu->insertUpdate($data);
            $this->reseedGmenu("menu", $id_menu);
        } catch (\Throwable $th) {
            return redirect()->to(base_url().'/menu')->with('error', 'Data gagal dibuat!' . $th);
        }

        return redirect()->to(base_url().'/menu')->with('success', 'Data berhasil dibuat!');
    }

    public function detail($kategori)
    {
        $menu = $this->menu->getMenubyName('Menu');
        $data = [
            'title'      => 'Menu',
            'subtitle'   => 'Detail',
            'active'     => 'active',
            'menus'      => $this->menu->getMenubyCategory($kategori),
            'gmenu'      => $this->gmenu->getGroupmenubyFKey(session()->group, $menu->id),
            'validation' => $this->validation
        ];
        
        return view('master_data/menu/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title'      => 'Menu',
            'subtitle'   => 'Edit',
            'active'     => 'active',
            'menu'       => $this->menu->getAll($id),
            'validation' => $this->validation
        ];

        return view('master_data/menu/edit', $data);
    }

    public function update($id)
    {
        $menu = $this->menu->getAll($id);
        if (isset($menu) == True) {
            $ruleNama = 'required|min_length[2]|alpha_numeric_punct';
        } else {
            $ruleNama = 'required|min_length[2]|alpha_numeric_punct|is_unique[menus.nama_menu]';
        }

        if (!$this->validate([
			'nama_menu' => [
                'rules'  => $ruleNama,
                'errors' => [
                    'required'            => 'Nama Group tidak boleh kosong!',
                    'min_length'          => 'Nama Group minimal 2 huruf!',
                    'alpha_numeric_punct' => 'Nama Group tidak boleh menggunakan karakter khusus kecuali (~, !, #, $, %, &, *, -, _, +, =, |, :, dan .)!',
                    'is_unique'           => 'Nama Group sudah terdaftar!',
                ]
			]
        ])) {
            return redirect()->to(base_url().'/menu/edit/' . $id)->withInput();
        }

        $data = $this->request->getVar();
        try {
            $this->menu->insertUpdate($data, $id);
        } catch (\Throwable $th) {
            return redirect()->to(base_url().'/menu')->with('error', 'Data gagal diubah!' . $th);
        }

        return redirect()->to(base_url().'/menu')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $this->menu->destroy($id);
        $this->reseedGmenu();
        return redirect()->to(base_url() . '/menu')->with('success', 'Data berhasil dihapus!');
    }
}
