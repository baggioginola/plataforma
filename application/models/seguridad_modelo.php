<?php
class Seguridad_modelo extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    
	function generar_sello($valor)
	{
		$salt="p14t4f0rm4";
		return md5($salt.$valor);
	}
	
	function verificar_sello($valor,$sello)
	{
		$sello_temporal = $this->generar_sello($valor);
                
		if($sello_temporal == $sello)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function sellar_sesion($auth)
	{
		$sello = $this->generar_sello($auth['id']);
		
		$auth['sello'] = $sello;
		
		$_SESSION["sello"] = $auth['sello'];
		$_SESSION['id'] = $auth['id'];
		$_SESSION['tipo'] = $auth['tipo'];
		$_SESSION['nivel'] = $auth['nivel'];
		$_SESSION['control'] = $auth['control'];
		
	}
	
	function validar_sesion()
	{
		if(!(isset($_SESSION['id'])))
		{
			return false;
		}
		else
		{
			$sello = $this->generar_sello($_SESSION['id']);
			$sello_auth = $_SESSION['sello'];
			
			if($sello_auth == $sello)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
	}
	
	function generar_token()
	{
		$aleatorio = rand();
		$token = $this->generar_sello($aleatorio);
		$_SESSION['token'] = $token;
		return $token;
	}
	
	function verificar_token($token)
	{
		$token_servidor = $_SESSION["token"];
		
		if($token == $token_servidor)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
?>