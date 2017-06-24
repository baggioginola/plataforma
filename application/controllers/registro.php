<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
#Response codes
define('STATUS_SUCCESS', 200);
define('STATUS_FAILURE_CLIENT', 404);
define('STATUS_FAILURE_INTERNAL', 500);

define('MESSAGE_SUCCESS', 'La transaccion fue exitosa');
define('MESSAGE_ERROR', 'La transaccion fue fallida, intente mas tarde');

class Registro extends CI_Controller
{
    private $parameters = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->model('maestros_modelo');
        $this->load->model('cursos_modelo');
        $this->load->model('alumnos_modelo');
    }

    public function index()
    {
        $data['pagina'] = 'registro';

        $captcha = $this->captcha();

        $data['captcha'] = $captcha;
        $this->Seguridad_modelo->generar_token();

        $this->load->view('_template', $data);
    }


    public function agregar_datos()
    {
        if (!$this->_setParameters()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }

        $where = "and matricula = '" . $this->parameters['matricula'] . "' ";

        $result = $this->alumnos_modelo->buscar($where);

        if (empty($result)) {
            $this->parameters['fecha_alta'] = date('Y-m-d');
            $this->parameters['fecha_modifica'] = date('Y-m-d');
            $this->parameters['status'] = 1;

            $this->alumnos_modelo->agregar($this->parameters);

            echo json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS));
        } else {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, 'La matricula ya existe, intente de nuevo'));
            return;
        }
    }

    public function captcha()
    {
        $conf_captcha = array(
            'word' => random_string('alnum', 6),
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'font_path' => './fonts/Skranji-Regular.ttf',
            'img_width' => '515',
            'img_height' => '95',
            'expiration' => 600
        );

        $cap = create_captcha($conf_captcha);
        return $cap;
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

    private function getResponse($status = STATUS_SUCCESS, $message = MESSAGE_SUCCESS, $data = array())
    {
        return array('status' => $status, 'message' => $message, 'data' => $data);
    }
}