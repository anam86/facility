<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seedings extends Migration
{
    public function up()
    {
        $seeder = \Config\Database::seeder();
        $seeder->call('DataSeeder');
    }

    public function down()
    {
        //
    }
}
