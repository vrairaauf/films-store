<?php
namespace app\table;
use core\table\Table; 
class AdminTable extends Table{
	public function authentification($email, $password){
		return $this->create_req('SELECT * FROM admin WHERE admin_email=? AND password=?',[$email, sha1($password)], true);
	}
	public function deconnexion(){
		unset($_SESSION['admin_account']);
		header('location: index.php');
	}
}
?>