<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->model('user_model','users');
        $this->load->model('solicitud_model','solicitudes');
        $this->load->helper(array('url'));
        $this->request = json_decode(file_get_contents('php://input'));
        $this->load->library('phpmailer_lib');
    }

	public function _remap($method, $params = array())
    {
        if (method_exists($this, $method))
        {
            if(!$this->session->userdata('logged')) redirect(base_url()."login");
            else
                return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }

	public function index()
	{
        $all=$this->solicitudes->getALL();
        $data['todas']=count($all);
        $data['enviado']=0;
        $data['planificado']=0;
        $data['realizado']=0;
        $data['pospuesto']=0;
        $data['cancelado']=0;
        foreach($all as $item)
        {
            if($item['estado']=="Enviado")
                $data['enviado']++;
            else if($item['estado']=="Planificado")
                $data['planificado']++;
            else if($item['estado']=="Realizado")
                $data['realizado']++;
            else if($item['estado']=="Pospuesto")
                $data['pospuesto']++;
            else if($item['estado']=="Cancelado")
                $data['cancelado']++;
        }

        $data['solicitudes']=$all;
        $data['body']="admin";
        $this->load->view('template/template',$data);
    }
    
	public function calendar()
	{
        $css[]='template/libs/jquery-ui/jquery-ui.bundle.css';
        $css[]='template/libs/fullcalendar/fullcalendar.bundle.css';
        $css[]='template/libs/swal/sweetalert.css';
        $js[]='template/libs/jquery-ui/jquery-ui.bundle.js';
        $js[]='template/libs/fullcalendar/fullcalendar.bundle.js';
		
		$js[]='template/libs/swal/sweetalert.min.js';
        $js[]='template/libs/axios/axios.min.js';
        $js[]='app/admin/calendar.js';
        $data['css']=$css;
        $data['js']=$js;
        $all=$this->solicitudes->getALL();
        $plan=$this->solicitudes->getEnviadas();
        $planificadas=$this->solicitudes->getPlanificadas();
        $events=[];
        foreach($planificadas as $item)
        {
           $ev=array(
                'id'=>$item['id'],
                'title'=>$item['nombre'],
                'description'=>$item['descripcion'],
                'estado'=>$item['estado_id'],
                'lugar'=>$item['lugar'],
                'correo'=>$item['correo'],
                'start'=>date('Y-m-d',$item['fecha_plan']),
                'end'=>date('Y-m-d',$item['end'])
            );
            if($item['estado']=='Planificado')
                $ev['className']="m-fc-event--primary";
            else if($item['estado']=='Realizado')
                $ev['className']="m-fc-event--success";
            else if($item['estado']=='Pospuesto')
                $ev['className']="m-fc-event--warning";
            else if($item['estado']=='Pospuesto')
                $ev['className']="m-fc-event--danger";
            else
                $ev['className']="m-fc-event--info";
            $events[]=$ev;
        }
        
        $data['estados']=$this->solicitudes->getEstados();
        $data['eventos']=$events;
        $data['solicitudes']=$all;
        $data['plan']=$plan;
        $data['body']="plan";
        $this->load->view('template/template',$data);
    }
    
    public function planificarTask()
    {
        $id=$this->request->id;
        $time=strtotime($this->request->time);
        $correo=$this->request->correo;
        $this->solicitudes->planificar($id,$time);
        $this->mailSend($correo,$time);
        echo json_encode(['status'=>'success','msg'=>'Actividad actualizada correctamente']);
        
    }

    public function mailSend($user,$date)
    {
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $config=$this->config->item('mail_conf');
        $mail->isSMTP();
        $mail->Host     = $config['host'];
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        $mail->Port     = $config['port'];
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
        $mail->CharSet = 'UTF-8';
        
        $mail->setFrom($config['username'], 'Servicios de Informática');
        // Add a recipient
        $mail->addAddress($user);
        // Email subject
        $mail->Subject = 'Planificación de solicitud de servicios';
        // Set email format to HTML
        $mail->isHTML(true);
        // Email body content
        $mailContent = "<h1>Planificación de servicios informáticos</h1>
            <p>El servicio solicitado por usted ha sido planificado para la la fecha: ".date("d-m-Y",$date)." cualquier inquietud, 
            contacte con el administrador del sistema.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            error_log('Mailer Error: ' . $mail->ErrorInfo, 0);
        }
    }

    public function moveTask()
    {
        $id=$this->request->id;
        $time=strtotime($this->request->time);
        $this->solicitudes->planificar($id,$time);
        echo json_encode(['status'=>'success','msg'=>'Actividad actualizada correctamente']);
    }

    public function addOrUpdate()
    {
        $id=$this->input->post('id');
        $nombre=$this->input->post('nombre');
        $correo=$this->input->post('correo');
        $lugar=$this->input->post('lugar');
        $descripcion=$this->input->post('descripcion');
        $time=$this->input->post('fecha');
        $fecha=DateTime::createFromFormat('d M Y - H:i A', $time);
        $time=strtotime($fecha->format('d-m-Y H:i'));
        $estado=$this->input->post('estado'); 
        $msg=$this->solicitudes->addOrUpdate($id,$time,$nombre,$lugar,$correo,$descripcion,$estado);
        echo json_encode(['status'=>'success','msg'=>$msg]);
    }

}
