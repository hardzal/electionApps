<?php
class Migration_votes extends CI_Migration
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
			'election_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'user_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('votes');
	}
	public function down()
	{
		$this->dbforge->drop_table('votes');
	}
}
