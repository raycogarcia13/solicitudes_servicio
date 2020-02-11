<?php

class User_model extends CI_Model {

	public function __construct(){
		 $this->load->database();
	}

    public function encoder($pass)
    {
        return sha1($pass);
    }

    public function autenticate($user,$pass)
    {
        $this->db->where('username',$user );
        $this->db->where('password',$this->encoder($pass));
        $query = $this->db->get('usuario');

        if($query->num_rows()==1)
            return $query->row();
        else{
            return false;
        }
    }

    public function addUser($username,$password,$admin=false)
    {
        $data=array(
            'username'=>$username,
            'password'=>$this->encoder($password),
            'admin'=>$admin,
        );
        $qry= $this->db->where('username', $username)->get('usuario');
        if($qry->num_rows()>0)
             return false;
        
        return $this->db->insert('usuario',$data);
    }

}