<?php
$app=App::get_instance();
//on recupere un film par son id envoyer au url 
if($_GET['type']=='film'){
	$un_film=$app->get_table('film')->get_one_film($_GET['id']);
	echo '<div>';
	echo '<h5><strong>'.$un_film->titre.'</strong></h5>';
	echo '<br>';
	//en recuppere le trailer 
	$trailer=$app->get_table('trailer')->get_film_trailer($un_film->id_film);

	//en affiche le trailer	
	echo '<video controls="controls">';
	$trailer->affiche_trailer();
	echo '</video>';

	echo '<hr>';
	//en affiche un description pour le film
	echo '<p>'.$un_film->description.'</p>';
	//en ajoute un ebouton telechager qui se envoyer le user sur le serveur de telechargement du film
	echo '<p><a href="'.$un_film->lien_telechargement.'" target="blanc">télécharger</a><p>';
	echo '</div>';
	echo '<hr>';
	$systeme_de_recommendation=$app->get_table('film')->systeme_de_recommendation($un_film->id_film);
	if($systeme_de_recommendation){
		echo '<div style="display:flex">';
		foreach($systeme_de_recommendation as $item){
			echo '<div style="width:400px;border-style:solid">';
	//on va recupere limage du film 
	$image=$app->get_table('image')->get_film_image($item->id_film);

	//en affiche le titre du film
	echo '<h5><strong>'.$item->titre.'<strong><h5>';
	//en affiche limage du film voir le fichier imageEntity pour voir la methode affiche_image
	$image->affiche_image();
	echo '<p><a href="?p=detaille&type=film&id='.$item->id_film.'">voir le film</a></p>';

	echo '</div>';
		}
		echo '</div>';
	}
}else{
	$une_serie=$app->get_table('serie')->get_one_serie($_GET['id']);
	echo '<div>';
	echo '<h5><strong>'.$une_serie->titre_serie.'</strong></h5>';
	echo '<h4><strong>Episode   :'.$une_serie->nb_episode.'</strong></h4>';
	echo '<br>';
	//en recuppere le trailer 
	$trailer=$app->get_table('trailer')->get_serie_trailer($une_serie->id_serie);

	//en affiche le trailer	
	echo '<video controls="controls">';
	$trailer->affiche_trailer();
	echo '</video>';
	echo '<hr>';
	//en affiche un description pour le film
	echo '<p>'.$une_serie->description.'</p>';
	//en ajoute un ebouton telechager qui se envoyer le user sur le serveur de telechargement du film
	echo '<p><a href="'.$une_serie->lien_telechargement.'" target="blanc">télécharger</a><p>';
	echo '</div>';
	echo '<hr>';
	

	$systeme_de_recommendation=$app->get_table('serie')->systeme_de_recommendation($une_serie->titre_serie, $une_serie->id_serie);
	if($systeme_de_recommendation){
		
		
		echo '<div style="display:flex">';
		foreach($systeme_de_recommendation as $serie){
			echo '<div style="width:400px;border-style:solid">';
	//on va recupere limage du serie 
	$image=$app->get_table('image')->get_serie_image($serie->id_serie);

	//en affiche le titre du serie
	echo '<h5><strong>'.$serie->titre_serie.'<strong><h5>';
	echo '<h4><strong>Episode   :'.$serie->nb_episode.'</strong></h4>';
	//en affiche limage du film voir le fichier imageEntity pour voir la methode affiche_image
	if($image){
	$image->affiche_image();
	}else{
		echo '<p>aucune image pour cet serie</p>';
	}
	echo '<p><a href="?p=detaille&type=serie&id='.$serie->id_serie.'">voir le serie</a></p>';

	echo '</div>';
		}
		echo '</div>';
	}
}

?>