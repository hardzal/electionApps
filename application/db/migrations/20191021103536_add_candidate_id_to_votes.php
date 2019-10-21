<?php
class Migration_add_candidate_id_to_votes extends CI_Migration
{
	public function up()
	{
		$field = array(
			'candidate_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			)
		);
		$this->dbforge->add_column('votes', $field);
		$this->db->query('ALTER TABLE votes ADD CONSTRAINT `fk_vote_candidate_id` FOREIGN KEY(candidate_id) REFERENCES candidates(id)');
	}
	public function down()
	{
		$this->dbforge->drop_column('votes', 'candidate_id');
	}
}
