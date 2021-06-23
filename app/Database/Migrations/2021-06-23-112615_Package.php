<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Package extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'foto'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'type'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'location'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'price'       => [
				'type'       => 'INT',
				'constraint' => '5',
			],
			'package_features'       => [
				'type'       => 'TEXT',
				'null' => false,
			],
			'package_detail'       => [
				'type'       => 'TEXT',
				'null' => false,
			],
			'created_at'       => [
				'type'       => 'DATETIME',
			],
			'updated_at'       => [
				'type'       => 'DATETIME',
			]
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('packages');
	}

	public function down()
	{
		$this->forge->dropTable('packages');
	}
}
