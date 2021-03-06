<?php
class Migration_user_permissions extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'INT',
			),
			'permission_id' => array(
				'type' => 'INT',
			)
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_permissions');
    }
    public function down() {
        $this->dbforge->drop_table('user_permissions');
    }
}
