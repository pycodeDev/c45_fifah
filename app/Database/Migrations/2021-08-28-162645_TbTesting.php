<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbTesting extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id'           => [
                'type'              => 'INT',
                'constraint'        => 15,
                'auto_increment'    => TRUE
            ],
            'jk'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'umur'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
			],
			'job'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
			'status'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
			'keputusan'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tb_cek_potensi');
	}

	public function down()
	{
		$this->forge->dropTable('tb_cek_potensi');
	}
}
