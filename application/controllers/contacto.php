<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 16/jun/2017
 * Time: 20:48
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['pagina'] = 'contacto';
        $this->load->view('_template', $data);
    }
}