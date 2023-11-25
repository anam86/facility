<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class EnumSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'key'           => 1,
                'value'         => 'Laki-laki',
                'kategori'      => 'jenis kelamin',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'key'           => 2,
                'value'         => 'Perempuan',
                'kategori'      => 'jenis kelamin',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
        ];

        $this->db->table('enums')->insertBatch($data);
    }
}
