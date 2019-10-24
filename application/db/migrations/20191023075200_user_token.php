<?php
class Migration_user_token extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'token' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
			),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_token');
    }
    public function down() {
        $this->dbforge->drop_table('user_token');
    }
}
