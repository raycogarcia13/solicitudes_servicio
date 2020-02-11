<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','users');
        $this->load->model('solicitud_model','solicitudes');
		$this->load->helper(array('url'));
    }

	public function index()
	{
		$css[]='template/libs/swal/sweetalert.css';
		
		$js[]='template/libs/swal/sweetalert.min.js';
        $js[]='template/libs/axios/axios.min.js';
        $js[]='app/client/main.js';

        $data['js']=$js;
        $data['css']=$css;
		$this->load->view('nueva',$data);
	}

	public function nueva()
	{
		$name=$this->input->post('name');
		$correo=$this->input->post('correo');
		$lugar=$this->input->post('lugar');
		$desc=$this->input->post('descripcion');

		$this->solicitudes->nueva($name,$lugar,$correo,$desc);
		echo json_encode(['success'=>true]);
	}

	public function main()
	{
		$js[]='template/libs/datatables/jquery.dataTables.min.js';
		$js[]='template/libs/datatables/DT_bootstrap.js';
		$css[]='template/libs/datatables/DT_bootstrap.css';
		$js[]='app/client/table.js';
		$data['js']=$js;
		$data['css']=$css;
		$data['all']=$this->solicitudes->getALL();
		$this->load->view('main',$data);
	}

}
