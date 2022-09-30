<?php
require '../app/App.php';
App::load();
$page='principal';
if(isset($_GET['p'])){
	$page=$_GET['p'];
}
ob_start();


switch ($page) {
	case 'detaille':
		require  '../app/views/detaille.php';
		break;
	default:
		require  '../app/views/principal.php';
		break;
		
}
$contenu=ob_get_clean();
require '../app/views/templates/templates.php';

?>