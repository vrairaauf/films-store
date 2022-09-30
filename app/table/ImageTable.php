<?php
namespace app\table;
use core\table\Table; 
class ImageTable extends Table{
	public function ajouter_image_serie($name, $id_serie){
		return $this->db->getPDO()->exec("INSERT INTO images SET id_serie='".$id_serie."', name_image='".$name."'");
	}


	public function ajouter_image_film($name, $id_film){
		return $this->db->getPDO()->exec("INSERT INTO images SET id_film='".$id_film."', name_image='".$name."'");
	}
	public function get_film_image($id_film){
		return $this->create_req('SELECT * FROM images WHERE id_film=?', [$id_film], true);
	}
	public function get_serie_image($id_serie){
		return $this->create_req('SELECT * FROM images WHERE id_serie=?', [$id_serie], true);
	}
	
}
?>