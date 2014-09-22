<?php require_once (dirname(dirname(__FILE__)).'/funcoes.php'); 
	switch ($tela) {
		case 'login':
			echo "<h2>Tela de login</h2>";
			break;
		
		default:
			echo "<p>A tela solicitada não existe!</p>";
			break;
	}
?>