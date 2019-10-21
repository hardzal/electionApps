<?php
class Migration_generations extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'generation' => array(
				'type' => 'CHAR',
				'constraint' => 4,
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('generations');
	}
	public function down()
	{
		$this->dbforge->drop_table('generations');
	}
}
