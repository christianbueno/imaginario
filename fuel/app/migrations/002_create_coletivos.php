<?php

namespace Fuel\Migrations;

class Create_coletivos
{
	public function up()
	{
		\DBUtil::create_table('coletivos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 150, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'metadata' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('coletivos');
	}
}