<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Access extends BaseController
{
    public function index()
    {
        if (session()->group != 1) {
            if (session()->login == true) {
                return redirect()->to(base_url() . '/dashboard');
            } else {
                return redirect()->to(base_url() . '/')->with("error","Silahkan login terlebih dahulu!");
            }
        }

        $data = [
            "title"     => "Master Access",
            "groups"     => $this->group->getAll(),
            "gmenus"     => $this->gmenu->getAll(),
            "menus"      => $this->menu->getAll()
        ];

        return view("access/index", $data);
    }
    
    public function update()
    {
        $data = $this->request->getVar();
        foreach ($data["data"] as $key => $value) {
            $this->gmenu->destroyGroupmenubyFKey($value["id_group"],$value["id_menu"]);
            $this->gmenu->insertGroupmenu($value);
        }

        return redirect()->to(base_url() . '/master-access')->with("success","Success");
    }
}
