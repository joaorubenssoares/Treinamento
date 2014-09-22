<?php session_start(); 
if (strlen($_SESSION['idUsuario']) <= 0) 
{
	session_destroy();
	header("Location: index.php");
	exit();	
}
function codificaSenha($senha){
		return md5($senha);
	}
	
	function loadModulo($modulo=null, $tela=null){
		if ($modulo==null || $tela==null) 
		{
			echo '<p>Erro na função<strong>'.__FUNCTION__.'</strong>: faltam parâmetros para execução!</p>';
		} 
		else 
		{
			if (file_exists(modulos/"$modulo.php")) {
				include_once (modulos/"$modulo.php");
			} 
			else 
			{
				echo '<p>Módulo inexistente neste sistema!</p>';
			}
		}	
	}
require_once 'conexao.php';