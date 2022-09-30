<?php
namespace app\Entity;
use core\Entity\Entity;
class TrailerEntity extends Entity{
	public function affiche_trailer(){
		echo '<source src="'.$this->path_video.$this->name_video.'">';
	}
}