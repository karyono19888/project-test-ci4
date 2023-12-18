<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Teams extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_team' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'negara' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tahun_berdiri' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'stadion' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pelatih' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'manager' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'tidak aktif'],
                'default'    => 'aktif',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('teams');
    }

    public function down()
    {
        $this->forge->dropTable('teams');
    }
}
