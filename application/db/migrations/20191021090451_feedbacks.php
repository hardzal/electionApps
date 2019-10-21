<?php
class Migration_feedbacks extends CI_Migration
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
			'user_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'election_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'title' => array(
				'type' => 'INT',
			),
			'description' => array(
				'type' => 'TEXT',
			),
			'rate' => array(
				'type' => 'FLOAT',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'deleted_at' => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field('CONSTRAINT `fk_feedback_user_id` FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE');
		$this->dbforge->add_field('CONSTRAINT `fk_feedback_election_id` FOREIGN KEY (election_id) REFERENCES elections(id) ON DELETE CASCADE');
		$this->dbforge->create_table('feedbacks');
	}
	public function down()
	{
		$this->dbforge->drop_table('feedbacks');
	}
}
