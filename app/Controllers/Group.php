<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Group extends BaseController
{
    public function index()
    {
        if (session()->login != true) {
            return redirect()->to(base_url() . '/')->with('error', 'Silahkan login terlebih dahulu!');
        }

        $group  = $this->group->getAll();
        $menu   = $this->menu->getMenubyName('Group');
        
        $data = [
            'title' => 'Group',
            'group' => $group,
            'gmenu' => $this->gmenu->getGroupmenubyFKey(session()->group, $menu->id)
        ];

        return view('master_data/group/index', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Group',
            'subtitle'      => 'Create',
            'active'        => 'active',
            'validation'    => \Config\Services::validation()
        ];

        return view('master_data/group/create', $data);
    }
    
    public function store()
    {
        if (!$this->validate([
			'nama_group' => [
                'rules' => 'required|min_length[2]|alpha_numeric_punct|is_unique[groups.nama_group]',
                'errors' => [
                    'required' => 'Nama Group tidak boleh kosong!',
                    'min_length' => 'Nama Group minimal 2 huruf!',
                    'alpha_numeric_punct' => 'Nama Group tidak boleh menggunakan karakter khusus kecuali (~, !, #, $, %, &, *, -, _, +, =, |, :, dan .)!',
                    'is_unique' => 'Nama Group sudah terdaftar!',
                ]
			]
        ])) {
            return redirect()->to(base_url().'/group/create')->withInput();
        }

        $data = $this->request->getVar();
        try {
            $id_group = $this->group->insertUpdate($data);
            $this->reseedGmenu("group", $id_group);
        } catch (\Throwable $th) {
            return redirect()->to(base_url().'/group')->with('error', 'Data gagal dibuat!' . $th);
        }

        return redirect()->to(base_url().'/group')->with('success', 'Data berhasil dibuat!');
    }

    public function edit($id)
    {
        $group   = $this->group->getAll($id);
        $data       = [
            'title'         => 'Group',
            'subtitle'      => 'Edit',
            'active'        => 'active',
            'group'         => $group,
            'validation'    => \Config\Services::validation()
        ];

        return view('master_data/group/edit', $data);
    }

    public function update($id)
    {
        $group  = $this->group->getAll($id);
        if (isset($group) == True) {
            $ruleNama   = 'required|min_length[2]|alpha_numeric_punct';
        } else {
            $ruleNama   = 'required|min_length[2]|alpha_numeric_punct|is_unique[groups.nama_group]';
        }

        if (!$this->validate([
			'nama_group' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => 'Nama Group tidak boleh kosong!',
                    'min_length' => 'Nama Group minimal 2 huruf!',
                    'alpha_numeric_punct' => 'Nama Group tidak boleh menggunakan karakter khusus kecuali (~, !, #, $, %, &, *, -, _, +, =, |, :, dan .)!',
                    'is_unique' => 'Nama Group sudah terdaftar!',
                ]
			]
        ])) {
            return redirect()->to(base_url().'/group/edit/' . $id)->withInput();
        }

        $data   = $this->request->getVar();
        try {
            $this->group->insertUpdate($data, $id);
        } catch (\Throwable $th) {
            return redirect()->to(base_url().'/group')->with('error', 'Data gagal diubah!' . $th);
        }

        return redirect()->to(base_url().'/group')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $this->group->destroy($id);
        $this->reseedGmenu();
        return redirect()->to(base_url() . '/group')->with('success', 'Data berhasil dihapus!');
    }
}
