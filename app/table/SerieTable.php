<?php
namespace app\table;
use core\table\Table; 
class SerieTable extends Table{
	public $perpage=2;
	public function ajouter_serie($titre, $episode, $desc,  $lien){
		return $this->db->getPDO()->exec("INSERT INTO serie SET titre_serie='".$titre."', description='".$desc."', lien_telechargement='".$lien."', nb_episode='".$episode."'")	;	
	}
	public function get_last_serie(){
		return $this->create_req("SELECT MAX(id_serie) AS id_serie FROM serie LIMIT 1");
	}

	public function get_serie(){
		return $this->create_req('SELECT * FROM serie GROUP BY titre_serie ');
	}
	public function total_series(){
		return $this->create_req('SELECT COUNT(id_serie) AS total_series FROM serie GROUP BY titre_serie');
	}
	public function get_one_serie($id){
		return $this->create_req('SELECT * FROM serie WHERE id_serie=?', [$id], true);
	}

	public function systeme_de_recommendation($titre, $id){
		return $this->create_req('SELECT * FROM serie WHERE titre_serie=? AND id_serie<>?', [$titre, $id]);
	}
}
?>