<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_group'    => 'Superadmin',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama_group'    => 'Admin',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama_group'    => 'Member',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
        ];

        $this->db->table('groups')->insertBatch($data);
    }
}
