<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersMaster extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_mobile' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
            'user_gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('user_masters');
    }

    public function down()
    {
        $this->forge->dropTable('user_masters');
    }
}
