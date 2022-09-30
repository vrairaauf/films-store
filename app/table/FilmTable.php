<?php
namespace app\table;
use core\table\Table; 
class FilmTable extends Table{
	public $perpage=2;
	
	public function ajouter_film($titre, $desc,  $lien){
		return $this->db->getPDO()->exec("INSERT INTO film SET titre='".$titre."', description='".$desc."', lien_telechargement='".$lien."'")	;	
	}
	public function get_last_film(){
		return $this->create_req("SELECT MAX(id_film) AS id_film FROM film LIMIT 1");
	}
	public function get_films($debut=0){
		return $this->create_req('SELECT * FROM film LIMIT '.$debut.', '.$this->perpage);
	}
	public function total_films(){
		return $this->create_req('SELECT COUNT(id_film) AS total_films FROM film');
	}
	public function get_one_film($id_film){
		return $this->create_req('SELECT * FROM film WHERE id_film=?', [$id_film], true);
	}
	public function systeme_de_recommendation($id){
		return $this->create_req('SELECT * FROM film WHERE id_film <> "'.$id.'" LIMIT 1, 3');
	}
}
?>