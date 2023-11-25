<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GroupMenus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'auto_increment' => true,
            ],
            'allow_view' => [
                'type'       => 'BOOLEAN',
                'default'    => false
            ],
            'allow_create' => [
                'type'       => 'BOOLEAN',
                'default'    => false
            ],
            'allow_edit' => [
                'type'       => 'BOOLEAN',
                'default'    => false
            ],
            'allow_delete' => [
                'type'       => 'BOOLEAN',
                'default'    => false
            ],
            'allow_import' => [
                'type'       => 'BOOLEAN',
                'default'    => false
            ],
            'allow_export' => [
                'type'       => 'BOOLEAN',
                'default'    => false
            ],
            'id_group' => [
                'type'       => 'BIGINT'
            ],
            'id_menu' => [
                'type'       => 'BIGINT'
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
        $this->forge->addForeignKey('id_group', 'groups', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_menu', 'menus', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('groupmenus');
    }

    public function down()
    {
        $this->forge->dropTable('groupmenus');
    }
}
