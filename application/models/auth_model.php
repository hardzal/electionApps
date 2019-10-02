<?php 

class auth_model extends CI_Model{
    public function index(){
        
    }

    public function getGenerations(){
        $result = $this->db->get('generations');
        return $result->result_array();
    }

    public function getMajors(){
        $result = $this->db->get('majors')->row_array();
        return $result;
    }

    public function insertDB($table, $data){
        $this->db->insert($table, $data);
    }

    public function getUserbyNim($table,$where){
        $result = $this->db->get_where($table,$where)->row_array();
        return $result;
    }





}


?>