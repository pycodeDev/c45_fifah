<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbData extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id'           => [
                'type'              => 'INT',
                'constraint'        => 20,
                'auto_increment'    => TRUE
            ],
            'nomor_trx'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'tanggal_jam'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
			'instansi'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
			],
            'nama'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
			],
			'jk'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
			'umur'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	'20',
			],
			'golongan'				=> [
				'type'	=>	'text',
			],
			'job'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
			'status'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	'100',
			],
			'jumlah'				=> [
				'type'	=>	'INT',
				'constraint'	=>	10,
			],
			'rekomendasi'				=> [
				'type'	=>	'VARCHAR',
				'constraint'	=>	100,
			],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tb_data');
	}

	public function down()
	{
		$this->forge->dropTable('tb_data');
	}
}
