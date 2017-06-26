<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        session_start();

        $this->load->model('login_modelo', '', TRUE);
    }


    public function index()
    {
        $this->load->view('acceso');
    }

    public function autentificacion()
    {
        $user = $this->input->post('user');
        $password = $this->input->post('password');

        $where = '';
        $where .= " and e_mail =  '" . $user . "' ";

        $data = $this->login_modelo->validacion_maestro($where);


        if (empty($data)) {
            $data = $this->login_modelo->validacion_alumno($where);

            if (empty($data)) {
                $mensaje = "vacio";

                echo json_encode($mensaje);
            } else {
                $email = $data->e_mail;

                if ($password == $data->password) {
                    $auth['id'] = $data->id_alumno;
                    $auth['tipo'] = "alumno";
                    $auth['control'] = $data->matricula;
                    $auth['nivel'] = 1;

                    $this->Seguridad_modelo->sellar_sesion($auth);

                    $_SESSION['nombre'] = $data->nombre . " " . $data->apellido_paterno . " " . $data->apellido_materno;

                    $mensaje = "valido_alumno";

                    echo json_encode($mensaje);
                } else {
                    $mensaje = "invalido";

                    echo json_encode($mensaje);
                }
            }


        } else {
            $email = $data->e_mail;

            if ($password == $data->password) {
                $auth['id'] = $data->id_maestro;
                $auth['tipo'] = "maestro";
                $auth['control'] = $data->no_control;
                $auth['nivel'] = $data->nivel;

                $this->Seguridad_modelo->sellar_sesion($auth);

                $_SESSION['nombre'] = $data->nombre . " " . $data->apellido_paterno . " " . $data->apellido_materno;

                $mensaje = "valido_maestro";

                echo json_encode($mensaje);
            } else {
                $mensaje = "invalido";

                echo json_encode($mensaje);
            }
        }

    }

    public function logout()
    {

        $this->session->unset_userdata("auth");  //borrar valores de la sesion
        $this->session->unset_userdata("nombre");  //borrar valores de la sesion
        $this->session->sess_destroy();

        header("location:" . site_url());
    }
}

?>