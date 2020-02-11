<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','users');
        $this->load->model('solicitud_model','solicitudes');
		$this->load->helper(array('url'));
    }

	public function index()
	{
		if($this->session->userdata('logged'))
			redirect(base_url().'admin'); 

		$data['username']='';
		if(!empty($_POST))
        {
                $username = $this->input->post('username');
                $pass = $this->input->post('password');

                $us = $this->users->autenticate($username,$pass);
                if ($us) {
                    $ses = array(
                        'logged' => TRUE,
                        'id' => $us->id,
                        'user' => $us->username,
                    );
					$this->session->set_userdata($ses);
					redirect(base_url().'admin');
                }
                else
                    $data['username'] = $username;
        }

		$css[]='template/libs/swal/sweetalert.css';
		$js[]='template/libs/swal/sweetalert.min.js';
        $js[]='template/libs/axios/axios.min.js';
		$js[]='app/client/login.js';
		$data['js']=$js;
		$this->load->view('login',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect(base_url());
	}
}
