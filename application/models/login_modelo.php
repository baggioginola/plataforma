<?php 
class Login_modelo extends CI_Model
{	
	function __construct(){
	parent::__construct(); 
}
   
	public function validacion_maestro($where='')
	{  
		$sql = "select id_maestro,nombre,apellido_paterno,apellido_materno,e_mail,password,status,nivel,no_control from maestro where 1=1  ".$where." and status = 1 ; ";
		
		$query = $this->db->query($sql);
		
		return $query->row();	
	}  
	
	
	public function validacion_alumno($where='')
	{  
		$sql = "select id_alumno,nombre,apellido_paterno,apellido_materno,e_mail,password,status,matricula from alumno where 1=1  ".$where." and status = 1 ; ";
		
		$query = $this->db->query($sql);
		
		return $query->row();	
	}  
   
}

?>