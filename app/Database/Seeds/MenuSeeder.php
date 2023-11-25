<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori'      => 'A',
                'urutan'        => '#',
                'ikon'          => 'database',
                'nama_menu'     => 'Master Data',
                'nama_url'      => '#',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'kategori'      => 'A',
                'urutan'        => '1',
                'ikon'          => 'ti-control-record',
                'nama_menu'     => 'Group',
                'nama_url'      => '/group',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'kategori'      => 'A',
                'urutan'        => '2',
                'ikon'          => 'ti-control-record',
                'nama_menu'     => 'User',
                'nama_url'      => '/user',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'kategori'      => 'B',
                'urutan'        => '#',
                'ikon'          => 'file-text',
                'nama_menu'     => 'Report',
                'nama_url'      => '/report',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
        ];

        $this->db->table('menus')->insertBatch($data);
    }
}
