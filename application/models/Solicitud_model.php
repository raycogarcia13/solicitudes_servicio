<?php

class Solicitud_model extends CI_Model {

	public function __construct(){
		 $this->load->database();
	}


    public function nueva($name,$location,$correo,$descr)
    {
        $data=array(
            'nombre'=>$name,
            'descripcion'=>$descr,
            'correo'=>$correo,
            'lugar'=>$location,
            'fecha'=>time(),
            'ip'=>$_SERVER['REMOTE_ADDR'],
            'estado_id'=>1
        );
        
        return $this->db->insert('solicitud',$data);
    }

    public function getALL()
    {
        $this->db->join('estado','estado.id=solicitud.estado_id');
        $this->db->order_by('fecha',"DESC");
        $all=$this->db->get('solicitud');
        return $all->result_array();
    }

    public function getEnviadas()
    {
        $this->db->join('estado','estado.id=solicitud.estado_id');
        $this->db->select('estado.estado,estado.color,solicitud.id,solicitud.nombre,solicitud.descripcion,solicitud.correo');
        $this->db->where('solicitud.estado_id',1);
        $all=$this->db->get('solicitud');
        return $all->result_array();
    }

    public function getPlanificadas()
    {
        $this->db->join('estado','estado.id=solicitud.estado_id');
        $this->db->select('estado.estado,estado.color,solicitud.id,solicitud.nombre,solicitud.descripcion,
            solicitud.fecha_plan,solicitud.lugar,solicitud.end,solicitud.estado_id,solicitud.correo');
        $this->db->where('solicitud.estado_id!=',1);
        $all=$this->db->get('solicitud');
        return $all->result_array();
    }

    public function getEstados()
    {
        $all=$this->db->get('estado');
        return $all->result_array();
    }

    public function planificar($id,$time)
    {
        $data=array(
            'fecha_plan'=>$time,
            'estado_id'=>2
        );
        $this->db->where('id',$id);
        return $this->db->update('solicitud',$data);
    }

    public function addOrUpdate($id,$time,$nombre,$lugar,$correo,$descripcion,$estado)
    {
        $data=array(
            'fecha_plan'=>$time,
            'estado_id'=>$estado,
            'nombre'=>$nombre,
            'descripcion'=>$descripcion,
            'correo'=>$correo,
            'lugar'=>$lugar
        );
        $msg="Actividad insertada correctamente";
        if($id!="")
        {
            $this->db->where('id',$id);
            $this->db->update('solicitud',$data);
            $msg="Actividad actualizada correctamente";
        }
        else
        {
            $data['fecha']=time();
            $this->db->insert('solicitud',$data);
        }

        return $msg;
    }

}