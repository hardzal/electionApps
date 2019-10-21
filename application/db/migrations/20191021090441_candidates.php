<?php
class Migration_candidates extends CI_Migration
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
			'image' => array(
				'type' => 'TEXT',
			),
			'misi' => array(
				'type' => 'TEXT',
			),
			'visi' => array(
				'type' => 'TEXT',
			),
			'status' => array(
				'type' => 'INT',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'updated_at' => array(
				'type' => 'DATETIME'
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field('CONSTRAINT `fk_election_id` FOREIGN KEY (election_id) REFERENCES elections(id) ON DELETE CASCADE');
		$this->dbforge->add_field('CONSTRAINT `fk_candidate_user_id` FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE');
		$this->dbforge->create_table('candidates');
	}
	public function down()
	{
		$this->dbforge->drop_table('candidates');
	}
}
