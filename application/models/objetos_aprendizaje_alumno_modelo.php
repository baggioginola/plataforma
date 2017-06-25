<?php

/**
 * Created by PhpStorm.
 * User: mario
 * Date: 24/jun/2017
 * Time: 20:24
 */
class Objetos_aprendizaje_alumno_modelo extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT id_objeto_aprendizaje, objeto_aprendizaje.nombre,objeto_aprendizaje.tipo,
                  objeto_aprendizaje.id_maestro,objeto_aprendizaje.id_curso,objeto_aprendizaje.status,
                  curso.nombre as curso
                  FROM objeto_aprendizaje
                  INNER JOIN curso
                  ON objeto_aprendizaje.id_curso = curso.id_curso
                  INNER JOIN curso_alumno
                  ON curso.id_curso = curso_alumno.id_curso
                  WHERE curso_alumno.id_alumno = '" . $_SESSION['id'] . "' AND objeto_aprendizaje.status = 1
                  AND curso.status = 1";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}