<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'auto_increment' => true,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ],
            'urutan' => [
                'type'       => 'VARCHAR',
                'constraint' => 2
            ],
            'ikon' => [
                'type'       => 'VARCHAR',
                'constraint' => 20
            ],
            'nama_menu' => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ],
            'nama_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus');
    }

    public function down()
    {
        $this->forge->dropTable('menus');
    }
}
