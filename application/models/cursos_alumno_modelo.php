<?php

class Cursos_alumno_modelo extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function buscar($where = '')
    {
        $sql = "select maestro.id_maestro,curso.id_curso,curso_alumno.id_curso_alumno,
				maestro.nombre, maestro.apellido_paterno,maestro.apellido_materno,curso.nombre as curso
				from alumno inner join curso_alumno
				on alumno.id_alumno = curso_alumno.id_alumno
				inner join curso
				on curso_alumno.id_curso = curso.id_curso
				inner join maestro
				on curso.id_maestro = maestro.id_maestro
				where 1=1  " . $where . " order by maestro.nombre,maestro.apellido_paterno,maestro.apellido_materno asc ; ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getAll()
    {
        $sql = "select maestro.id_maestro,curso.id_curso,curso_alumno.id_curso_alumno,
				concat(maestro.nombre,' ', maestro.apellido_paterno,' ',maestro.apellido_materno) as maestro,curso.nombre as curso
				from alumno inner join curso_alumno
				on alumno.id_alumno = curso_alumno.id_alumno
				inner join curso
				on curso_alumno.id_curso = curso.id_curso
				inner join maestro
				on curso.id_maestro = maestro.id_maestro
				where alumno.id_alumno = '" . $_SESSION['id'] . "'
				order by maestro.nombre,maestro.apellido_paterno,maestro.apellido_materno asc ; ";

        $query = $this->db->query($sql);

        return $query->result_array();
    }


    function agregar($datos)
    {
        $this->db->insert('curso_alumno', $datos);
    }


    function leer_registro($id)
    {
        $sql = "SELECT curso.fecha_alta,curso.nombre, tipo,curso.id_curso FROM
				maestro INNER JOIN curso
				ON maestro.id_maestro = curso.id_maestro
				where id_curso = '" . $id . "'";

        $query = $this->db->query($sql);

        return $query->row();
    }

    function editar($id, $datos)
    {
        $this->db->where('id_curso', $id);
        $this->db->update('curso', $datos);
    }

    function eliminar($id, $datos)
    {
        $this->db->where('id_curso', $id);
        $this->db->update('curso', $datos);
    }


}

?>