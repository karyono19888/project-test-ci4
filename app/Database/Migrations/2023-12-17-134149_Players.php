<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Players extends Migration
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
            'team_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl_lahir' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'nomor_punggung' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'posisi_pemain' => [
                'type'       => 'ENUM',
                'constraint' => ['defender', 'midfielder', 'forward', 'goal kiper'],
                'default'    => 'defender',
            ],
            'negara' => [
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
        $this->forge->createTable('players');
    }

    public function down()
    {
        $this->forge->dropTable('players');
    }
}
