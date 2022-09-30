<?php
require "../app/App.php";
App::load();
$page="login";
if(isset($_GET["p"])){
	$page=$_GET["p"];
}
ob_start();
switch($page){
	case 'dashbord':
	require '../app/views/admin/dashbord.php';
	break;
	case 'inserfilm':
	require '../app/views/admin/inserfilm.php';
	break;
	case 'inserserie':
	require '../app/views/admin/inserserie.php';
	break;
	case 'deconnexion':
	require '../app/views/admin/deconnexion.php';
	break;
	default :
	require "../app/views/admin/login.php";
	break;

}
$contenu=ob_get_clean();
require "../app/views/templates/templates.php";
?>
		
