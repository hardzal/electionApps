<?php
class Migration_majors extends CI_Migration
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
			'major' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'description' => array(
				'type' => 'TEXT',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'updated_at' => array(
				'type' => 'DATETIME',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('majors');
	}
	public function down()
	{
		$this->dbforge->drop_table('majors');
	}
}
