<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'admin_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'admin_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'admin_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'admin_password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('admin_id', true);
        $this->forge->createTable('admin_master');
    }

    public function down()
    {
        $this->forge->dropTable('admin_master');
    }
}
