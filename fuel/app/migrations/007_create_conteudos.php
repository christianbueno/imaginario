<?php

namespace Fuel\Migrations;

class Create_conteudos
{
	public function up()
	{
		\DBUtil::create_table('conteudos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'content' => array('type' => 'text'),
			'coletivo_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'type' => array('constraint' => 50, 'type' => 'varchar'),
			'metadata' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('conteudos');
	}
}