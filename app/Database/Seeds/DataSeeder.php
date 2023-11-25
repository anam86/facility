<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->call("EnumSeeder");
        $this->call("GroupSeeder");
        $this->call("MenuSeeder");
        $this->call("GroupMenuSeeder");
        $this->call("UserSeeder");
    }
}
