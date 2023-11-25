<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'      => 'super',
                'password'      => password_hash('123123', PASSWORD_BCRYPT),
                'email'         => 'super@gmail.com',
                'id_group'      => 1,
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'username'      => 'admin',
                'password'      => password_hash('123123', PASSWORD_BCRYPT),
                'email'         => 'admin@gmail.com',
                'id_group'      => 2,
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'username'      => 'anggota',
                'password'      => password_hash('123123', PASSWORD_BCRYPT),
                'email'         => 'anggota@gmail.com',
                'id_group'      => 3,
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
