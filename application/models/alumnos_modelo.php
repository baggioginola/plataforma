<?php 
class Alumnos_modelo extends CI_Model{

   function __construct(){
	parent::__construct(); 
  }
   
   public function buscar($where = '')
   {
        $sql = "select id_alumno,nombre,apellido_paterno,apellido_materno,e_mail,matricula from alumno where 1=1  ".$where." and status = 1; ";
        $query = $this->db->query($sql);
        return $query->result();
   }  
   
   
    function agregar($datos)
    {
       $this->db->insert('alumno', $datos);
    }
    
	
	function agregar_curso_alumno($datos)
    {
       $this->db->insert('curso_alumno', $datos);
    }
    
    
    function leer_registro($id)
    {
        $sql = "SELECT id_maestro,nombre,apellido_paterno,apellido_materno,e_mail,no_control,password,nivel
                FROM maestro
                WHERE id_maestro = '".$id."'";
       
        $query = $this->db->query($sql);
		
        return $query->row();
    }
    
    function editar($id,$datos)
    {
        $this->db->where('id_maestro',$id);
        $this->db->update('maestro', $datos);
    }
	
	function eliminar($id,$datos)
    {
		$this->db->where('id_maestro',$id);
		$this->db->update('maestro',$datos);
    }
	
	
	public function buscar_activos($where = '')
	{
		$sql = "SELECT maestro.id_maestro,maestro.nombre,maestro.apellido_paterno, maestro.apellido_materno 
				FROM
				maestro INNER JOIN curso
				ON maestro.id_maestro = curso.id_maestro
				where 1=1  ".$where." group by maestro.id_maestro order by nombre asc";
		
		$query = $this->db->query($sql);
   
   		return $query->result();
	}
}

?>