<?php
class Migration_elections extends CI_Migration
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
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'description' => array(
				'type' => 'TEXT',
			),
			'image' => array(
				'type' => 'TEXT',
			),
			'status' => array(
				'type' => 'INT',
			),
			'started_at' => array(
				'type' => 'DATETIME',
			),
			'end_at' => array(
				'type' => 'DATETIME',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'updated_at' => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field('CONSTRAINT `fk_election_major_id` FOREIGN KEY (major_id) REFERENCES majors(id) ON DELETE CASCADE');
		$this->dbforge->add_field('CONSTRAINT `fk_election_generation_id` FOREIGN KEY (generation_id) REFERENCES generations(id) ON DELETE CASCADE');
		$this->dbforge->create_table('elections');
	}
	public function down()
	{
		$this->dbforge->drop_table('elections');
	}
}
