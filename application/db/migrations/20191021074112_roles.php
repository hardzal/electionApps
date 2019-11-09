<?php
class Migration_roles extends CI_Migration
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
			'role' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'default' => 'mahasiswa',
			),
			'description' => array(
				'type' => 'TEXT'
			),
			'created_at' => array(
				'type' => 'TIMESTAMP'
			),
			'updated_at' => array(
				'type' => 'DATETIME'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('roles');

		// INSERT `roles` TABLE
		$data = array(
			array(
				'role' => 'admin',
				'description' => 'Admin mengatur pemilihan secara keseluruhan',
			),
			array(
				'role' => 'mahasiswa',
				'description' => 'Status default mahasiswa',
			),
			array(
				'role' => 'kandidat',
				'description' => 'Role kandidat sebagai siapa yang akan dipilih dalam pemilihan',
			)
		);

		$this->db->insert_batch('roles', $data);
	}
	public function down()
	{
		$this->dbforge->drop_table('roles');
	}
}
