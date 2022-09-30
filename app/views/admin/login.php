<p>la page login de admin</p>
<?php
if(isset($_POST['submit'])){
	if(!empty($_POST['email']) AND !empty($_POST['password'])){
		$app=App::get_instance();
		$auth=$app->get_table("admin")->authentification($_POST['email'], $_POST['password']);
		if($auth){
			$_SESSION['admin_account']=array('email'=>$auth->admin_email, 'password'=>$auth->password);
			header('location: ?p=dashbord');
		}else{
			echo 'ce compte nexiste pas';
		}
	}else{
		echo '<div class="alert alert-danger"><p>completer tous les champs</p></div>';
	}
}
?>
<div>
	<form method="post">
	<p><input type="email" name="email" autocomplete="false" placeholder="email"></p>
	<p><input type="password" name="password" placeholder="password"></p>
	<p><input type="submit" name="submit" value="connexion"></p>		
	</form>
</div>