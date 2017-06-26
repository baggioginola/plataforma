<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 24/jun/2017
 * Time: 20:23
 */

class Objetos_aprendizaje_alumno extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        session_start();

        if (!$this->Seguridad_modelo->validar_sesion()) {
            redirect(site_url(), "refresh");
        }

        $this->load->model('objetos_aprendizaje_alumno_modelo');
    }

    public function index()
    {
        $data['pagina'] = 'objetos_aprendizaje_alumno_gestor';
        $this->load->view('_template', $data);
    }

    public function getAll()
    {
        if (!$result = $this->objetos_aprendizaje_alumno_modelo->getAll()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }
        foreach ($result as $key => $value) {
            $sello = $this->Seguridad_modelo->generar_sello($value['id_objeto_aprendizaje']);
            $result[$key]['sello'] = $sello;
        }

        echo json_encode($this->UTF8Converter($result));
    }

    public function UTF8Converter($array)
    {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }

    protected function getResponse($status = STATUS_SUCCESS, $message = MESSAGE_SUCCESS, $data = array())
    {
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }
}