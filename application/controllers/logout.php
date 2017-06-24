<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}
        
	public function index()
	{
	   session_start();
		
		if( isset( $_COOKIE[session_name()] ) ) 
			setcookie( session_name(), '', time() - 42000, '/' );
		
		session_unset();
		session_destroy();
		
		redirect(site_url());	
	}

	
}

?>