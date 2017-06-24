<?php 
class Reportes_modelo extends CI_Model{

   function __construct(){
	parent::__construct(); 
  }
   
   public function buscar_cursos($where = '')
   {
        $sql = "select curso.tipo as tipo,curso.nombre as curso,maestro.nombre,maestro.apellido_paterno,maestro.apellido_materno
				from curso inner join maestro
				on curso.id_maestro = maestro.id_maestro
				where 1=1  ".$where." order by tipo,curso asc ; ";
        $query = $this->db->query($sql);
        return $query->result();
   }  
   
   
    function agregar($datos)
    {
       $this->db->insert('curso', $datos);
    }
	
    
    function leer_registro($id)
    {
        $sql = "SELECT curso.fecha_alta,curso.nombre, tipo,curso.id_curso FROM
				maestro INNER JOIN curso
				ON maestro.id_maestro = curso.id_maestro
				where id_curso = '".$id."'";
       
        $query = $this->db->query($sql);
		
        return $query->row();
    }
    
    function editar($id,$datos)
    {
        $this->db->where('id_curso',$id);
        $this->db->update('curso', $datos);
    }
	
	function eliminar($id,$datos)
    {
		$this->db->where('id_curso',$id);
		$this->db->update('curso',$datos);
    }
	
   
}

?>