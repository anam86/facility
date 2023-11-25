<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

use App\Models\GroupModel;
use App\Models\MenuModel;

class GroupMenuSeeder extends Seeder
{
    public function run()
    {
        $group  = new GroupModel();
        $menu   = new MenuModel();

        $groups = $group->getAll();
        $menus  = $menu->getAll();

        $access;
        foreach ($groups as $group) {
            if ($group->id == 1) { $access = true; }
            else { $access = false; }

            foreach ($menus as $menu) {
                $data = [
                    'allow_view'    => $access,
                    'allow_create'  => $access,
                    'allow_edit'    => $access,
                    'allow_delete'  => $access,
                    'allow_import'  => $access,
                    'allow_export'  => $access,
                    'id_group'      => $group->id,
                    'id_menu'       => $menu->id,
                    'created_at'    => Time::now(),
                    'updated_at'    => Time::now()
                ];
        
                $this->db->table('groupmenus')->insert($data);
            }
        }
    }
}
