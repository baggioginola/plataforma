<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

#Response codes
define('STATUS_SUCCESS', 200);
define('STATUS_FAILURE_CLIENT', 404);
define('STATUS_FAILURE_INTERNAL', 500);

define('MESSAGE_SUCCESS', 'La transaccion fue exitosa');
define('MESSAGE_ERROR', 'La transaccion fue fallida, intente mas tarde');

class Objetos_aprendizaje extends CI_Controller
{
    private $parameters = array();

    public function __construct()
    {
        parent::__construct();

        session_start();

        if (!$this->Seguridad_modelo->validar_sesion()) {
            redirect(site_url(), "refresh");
        }

        $this->load->model('objetos_aprendizaje_modelo');
        $this->load->model('cursos_modelo');
    }

    public function index()
    {

        if ($_SESSION['tipo'] == 'maestro') {
            $data['menu'] = 'menu';
        } else if ($_SESSION['tipo'] == 'alumno') {
            $data['menu'] = 'menu_alumno';
        }

        $where = 'and objeto_aprendizaje.status = 1 and objeto_aprendizaje.id_maestro = "' . $_SESSION['id'] . '"';
        $data['pagina'] = 'objetos_aprendizaje_gestor';
        $result = $this->objetos_aprendizaje_modelo->buscar($where);
        $data['result'] = $result;

        $this->load->view('_template', $data);
    }

    public function getAll()
    {
        if (!$result = $this->objetos_aprendizaje_modelo->getAll()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }
        foreach ($result as $key => $value) {
            $sello = $this->Seguridad_modelo->generar_sello($value['id_objeto_aprendizaje']);
            $result[$key]['sello'] = $sello;
        }

        echo json_encode($this->UTF8Converter($result));
    }

    public function agregar()
    {
        $this->Seguridad_modelo->generar_token();

        $where = 'and curso.status = 1 and maestro.id_maestro = "' . $_SESSION['id'] . '"';

        $result = $this->cursos_modelo->buscar($where);

        $data['pagina'] = 'objetos_aprendizaje_agregar';

        $data['result'] = $result;

        $this->load->view('_template', $data);
    }

    public function agregar_datos()
    {
        if (!$this->_setParameters()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }

        $token = $this->parameters['token'];

        if (!$this->Seguridad_modelo->verificar_token($token)) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, "No puedes agregar el objeto de aprendizaje"));
            return;
        } else {
            unset($this->parameters['token']);
            $this->parameters['descargas'] = rand(1, 50);
            $this->parameters['status'] = 1;
            $this->parameters['fecha_alta'] = date('Y-m-d');
            $this->parameters['fecha_modifica'] = date('Y-m-d');
            $this->parameters['id_maestro'] = $_SESSION['id'];

            $this->objetos_aprendizaje_modelo->agregar($this->parameters);

            $data['id'] = $this->db->insert_id();

            echo json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS, $data));
        }
    }

    public function editar()
    {
        $this->Seguridad_modelo->generar_token();

        $id = $this->input->get('id');
        $sello = $this->input->get('sello');

        if (!$this->Seguridad_modelo->verificar_sello($id, $sello)) {
            redirect(site_url() . "?c=administracion", "refresh");
            return;
        }

        $where = 'and curso.status = 1 and maestro.id_maestro = "' . $_SESSION['id'] . '"';

        $result_cursos = $this->cursos_modelo->buscar($where);

        $data['result_cursos'] = $result_cursos;
        $data['resultado'] = $this->objetos_aprendizaje_modelo->leer_registro($id);
        $data['pagina'] = 'objetos_aprendizaje_editar';

        $this->load->view('_template', $data);
    }

    public function editar_datos()
    {
        if (!$this->_setParameters()) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
            return;
        }

        $token = $this->parameters['token'];

        if (!$this->Seguridad_modelo->verificar_token($token)) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, "No puedes editar el objeto de aprendizaje"));
            return;
        } else {
            $this->Seguridad_modelo->generar_token();

            $this->parameters['fecha_modifica'] = date('Y-m-d');

            $id = $this->parameters['id_oculto'];

            unset($this->parameters['id_oculto']);
            unset($this->parameters['token']);
            $this->objetos_aprendizaje_modelo->editar($id, $this->parameters);
            echo json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS));
        }
    }

    public function eliminar()
    {
        $id = $this->input->get('id');
        $sello = $this->input->get('sello');

        if (!$this->Seguridad_modelo->verificar_sello($id, $sello)) {
            redirect(site_url() . "?c=administracion", "refresh");
            return;
        }

        $id = $this->input->get('id');
        $info['status'] = 0;

        $this->objetos_aprendizaje_modelo->eliminar($id, $info);

        header("Location: " . site_url() . "?c=objetos_aprendizaje");
    }

    public function agregar_archivo()
    {
        ini_set('memory_limit', 20000000000);

        $id = $this->input->post('id');

        $fileElementName = "archivo";

        $archivo = strtolower($_FILES['archivo']['name']);

        $ext = substr($archivo, strrpos($archivo, '.'));

        echo print_r($_FILES, 1);

        if ($ext == ".pdf" || $ext == '.PDF') {
            $config['upload_path'] = 'assets/archivos/pdf';
        } else if ($ext == '.ppt' || $ext == '.PPT' || $ext == '.pptx' || $ext == '.PPTX') {
            $config['upload_path'] = 'assets/archivos/ppt';
        } else if ($ext == '.doc' || $ext == '.DOC' || $ext == '.docx' || $ext == '.DOCX') {
            $config['upload_path'] = 'assets/archivos/doc';
        } else if ($ext == '.jpg' || $ext == '.JPG' || $ext == '.jpeg' || $ext == '.JPEG') {
            $config['upload_path'] = 'assets/archivos/jpg';
        } else if ($ext == '.png' || $ext == '.PNG') {
            $config['upload_path'] = 'assets/archivos/png';
        } else if ($ext == '.xls' || $ext == '.XLS' || $ext == '.xlsx' || $ext == '.XLSX') {
            $config['upload_path'] = 'assets/archivos/xls';
        } else {
            $config['upload_path'] = 'assets/archivos/';
        }

        //$config['allowed_types'] 	= 'jpg|jpeg|JPG|pdf|PDF|ppt|PPT|pptx|PPTX|doc|docx|DOC|DOCX|png|PNG|xls|xlsx|XLS|XLSX';
        $config['allowed_types'] = '*';
        $config['max_size'] = '200000';
        $config['max_width'] = '200000';
        $config['max_height'] = '200000';
        $config['overwrite'] = TRUE;

        $config['file_name'] = $id . $ext;

        $config['file_ext'] = $ext;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($fileElementName)) {
            echo json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        } else {

            if ($ext == ".pdf" || $ext == '.PDF') {
                $info['tipo'] = '.pdf';
            } else if ($ext == '.ppt' || $ext == '.PPT') {
                $info['tipo'] = '.ppt';
            } else if ($ext == '.pptx' || $ext == '.PPTX') {
                $info['tipo'] = '.pptx';
            } else if ($ext == '.doc' || $ext == '.DOC') {
                $info['tipo'] = '.doc';
            } else if ($ext == '.docx' || $ext == '.DOCX') {
                $info['tipo'] = '.docx';
            } else if ($ext == '.jpg' || $ext == '.JPG' || $ext == '.jpeg' || $ext == '.JPEG') {
                $info['tipo'] = '.jpg';
            } else if ($ext == '.png' || $ext == '.PNG') {
                $info['tipo'] = '.png';
            } else if ($ext == '.xls' || $ext == '.XLS') {
                $info['tipo'] = '.xls';
            } else if ($ext == '.xlsx' || $ext == '.XLSX') {
                $info['tipo'] = '.xlsx';
            }

            $info['path'] = $config['upload_path'] . '/' . $config['file_name'];

            $this->objetos_aprendizaje_modelo->editar($id, $info);

            ini_restore('memory_limit');
            echo json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS));
        }
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