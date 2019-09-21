<?php 

class Auth extends CI_Controller
{
    public function index(){
        $data['title'] = 'Login Page Himatif Election';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/index', $data);
        $this->load->view('templates/auth_footer',$data);
    }

    public function registration(){
        $data['title'] = 'Registration Page Himatif Election';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/registration', $data);
        $this->load->view('templates/auth_footer',$data);
    }
}



?>