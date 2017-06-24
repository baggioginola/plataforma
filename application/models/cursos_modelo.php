<?php

class Cursos_modelo extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function buscar($where = '')
    {
        $sql = "SELECT curso.fecha_alta,curso.nombre, tipo,curso.id_curso FROM
				maestro INNER JOIN curso
				ON maestro.id_maestro = curso.id_maestro
				where 1=1  " . $where . " order by nombre asc ; ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getAll()
    {
        $sql = "SELECT curso.fecha_alta,curso.nombre, tipo,curso.id_curso FROM
				maestro
				LEFT JOIN curso
				ON maestro.id_maestro = curso.id_maestro
				WHERE curso.status = 1
				AND maestro.id_maestro = '" . $_SESSION['id'] . "'
				ORDER BY nombre ASC; ";

        $query = $this->db->query($sql);

        return $query->result_array();
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