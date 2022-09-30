<p>la page dashbord</p>
<?php

if(!isset($_SESSION['admin_account'])){
	unset($_SESSION['admin_account']);
	header('location: ?p=login');
}
?>
<div>
	<p><a href="?p=inserfilm">ajouter un film</a></p>
	<p><a href="?p=inserserie">ajouter une serie</a></p>
	<p><a href="?p=deconnexion">deconnexion</a></p>
</div>