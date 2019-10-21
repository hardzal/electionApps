<?php
class Migration_user_details extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'user_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'generation_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'major_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'hp' => array(
				'type' => 'VARCHAR',
				'constraint' => 15,
			),
			'image' => array(
				'type' => 'TEXT',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'updated_at' => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field('CONSTRAINT `fk_user_id` FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE');
		$this->dbforge->add_field('CONSTRAINT `fk_major_id` FOREIGN KEY (major_id) REFERENCES majors(id) ON DELETE CASCADE');
		$this->dbforge->add_field('CONSTRAINT `fk_generation_id` FOREIGN KEY (generation_id) REFERENCES generations(id) ON DELETE CASCADE');
		$this->dbforge->create_table('user_details');
	}
	public function down()
	{
		$this->dbforge->drop_table('user_details');
	}
}
