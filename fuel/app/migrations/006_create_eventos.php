<?php

namespace Fuel\Migrations;

class Create_eventos
{
	public function up()
	{
		\DBUtil::create_table('eventos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'coletivo_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('type' => 'text'),
			'description' => array('type' => 'text'),
			'when' => array('constraint' => 11, 'type' => 'int'),
			'metadata' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('eventos');
	}
}