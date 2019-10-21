<?php
class Migration_users extends CI_Migration
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
			'role_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'nim' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				'unique' => TRUE,
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => TRUE,
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'is_active' => array(
				'type' => 'BOOLEAN',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
			'updated_at' => array(
				'type' => 'DATETIME'
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field('CONSTRAINT `fk_role_id` FOREIGN KEY (role_id) REFERENCES user_roles(id) ON DELETE CASCADE');
		$this->dbforge->create_table('users');

		$data = array(
			'role_id' => 1,
			'nim' => '123000000',
			'email' => "adminhmj@gmail.com",
			'is_active' => 1,
			'password' => password_hash('password', PASSWORD_DEFAULT)
		);

		$this->db->insert('users', $data);
	}
	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
