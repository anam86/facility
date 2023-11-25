<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enums extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'auto_increment' => true,
            ],
            'key' => [
                'type'           => 'BIGINT'
            ],
            'value' => [
                'type'       => 'VARCHAR',
                'constraint' => 100
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100
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
        $this->forge->createTable('enums');
    }

    public function down()
    {
        $this->forge->dropTable('enums');
    }
}
