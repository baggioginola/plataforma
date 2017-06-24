<?php 
class Grafica_modelo extends CI_Model{

   function __construct(){
	parent::__construct(); 
  }
   
   public function buscar($where = '')
   {
        $sql = "SELECT id_objeto_aprendizaje,objeto_aprendizaje.nombre,curso.nombre as curso, objeto_aprendizaje.tipo,
		descargas FROM
				objeto_aprendizaje inner join curso
				on objeto_aprendizaje.id_curso = curso.id_curso
				where 1=1  ".$where." order by curso,nombre; ";
        $query = $this->db->query($sql);
        return $query->result();
   }  
   
   
    function agregar($datos)
    {
       $this->db->insert('objeto_aprendizaje', $datos);
    }
	
    
    function leer_registro($id)
    {
        $sql = "SELECT id_objeto_aprendizaje,objeto_aprendizaje.nombre,curso.nombre as curso,curso.id_curso,
				objeto_aprendizaje.tipo,
				descargas 
				FROM
				objeto_aprendizaje inner join curso
				ON objeto_aprendizaje.id_curso = curso.id_curso
				where id_objeto_aprendizaje = '".$id."'";
       
        $query = $this->db->query($sql);
		
        return $query->row();
    }
    
    function editar($id,$datos)
    {
        $this->db->where('id_objeto_aprendizaje',$id);
        $this->db->update('objeto_aprendizaje', $datos);
    }
	
	function eliminar($id,$datos)
    {
		$this->db->where('id_objeto_aprendizaje',$id);
		$this->db->update('objeto_aprendizaje',$datos);
    }
	
   
}

?>