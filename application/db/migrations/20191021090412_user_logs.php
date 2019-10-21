<?php
class Migration_user_logs extends CI_Migration
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
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'desription' => array(
				'type' => 'TEXT',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'deleted_at' => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field('CONSTRAINT `fk_logs_user_id` FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE');
		$this->dbforge->create_table('user_logs');
	}
	public function down()
	{
		$this->dbforge->drop_table('user_logs');
	}
}
