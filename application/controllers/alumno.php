<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 25/jun/2017
 * Time: 19:43
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller
{
    private $parameters = array();

    public function __construct()
    {
        parent::__construct();

        session_start();

        if (!$this->Seguridad_modelo->validar_sesion()) {
            redirect(site_url(), "refresh");
        }

        $this->load->model('alumnos_modelo');
    }

    public function index()
    {
        $data['pagina'] = 'alumno';
        $this->load->view('_template', $data);
    }

    public function getById()
    {
        if (!$this->_setParameters()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }

        if(!$result = $this->alumnos_modelo->getById($this->parameters['id'])){
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }
        echo json_encode($this->UTF8Converter($result));

    }

    /**
     * @return bool
     */
    private function _setParameters()
    {
        if (!isset($_POST) || empty($_POST)) {
            return false;
        }

        foreach ($_POST as $key => $value) {
            $this->parameters[$key] = utf8_decode($value);
        }

        return true;
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