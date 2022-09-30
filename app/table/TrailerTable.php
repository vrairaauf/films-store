<?php
namespace app\table;
use core\table\Table; 
class TrailerTable extends Table{
	public function ajouter_trailer_serie($name, $id_serie){
		return $this->db->getPDO()->exec('INSERT INTO trailer SET id_serie="'.$id_serie.'", name_video="'.$name.'"');
	}
	public function ajouter_trailer_film($name, $id_film){
		return $this->db->getPDO()->exec('INSERT INTO trailer SET id_film="'.$id_film.'", name_video="'.$name.'"');
	}
	public function get_film_trailer($id){
		return $this->create_req('SELECT * FROM trailer WHERE id_film=?', [$id], true);
	}
	public function get_serie_trailer($id){
		return $this->create_req('SELECT * FROM trailer WHERE id_serie=?', [$id], true);
	}
}
?>