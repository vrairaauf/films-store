<?php
namespace app\Entity;
use core\Entity\Entity;
class ImageEntity extends Entity{
	public function affiche_image(){
		echo '<img style="width:200px;height:100px" src="'.$this->path_image.$this->name_image.'">';
	}
}