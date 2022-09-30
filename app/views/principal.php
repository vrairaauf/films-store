<?php
$app=App::get_instance();
//on propose des film pour lutilisateur du site 
//on propose pour lutilisateur des film aleatore 
//ce systeme de proposition n' est professionel
//on des grand projet on utilise des systéme bien précis

//on recuperer un objet film
//cela sapelle un design pattern factory
 $films=$app->get_table('film');
//en faire un systeme de pagination
if(isset($_GET['page'])){
	$page=$_GET['page'];	
}else{

	$page=0;
}
//on recupere le nombre total des lignes(film) dans la table film 
$total_films=$films->total_films();
//le nombre total des films dans la base de donnee
$total_lignes_films=$total_films[0]->total_films;

//on recupere l'attribut perpage de lobjet film pour lituliser dans le systeme de pagination
$perpage_films=$films->perpage;
//on calcule le nombre de page necessaire pour afficher tous nos films dans la base de donne 
//alors on calcule un variable nb_page
//la $total_ligne est de type string alors on va changer au entier avec la fonction predefini intval() est on va arrondir avec la fonction predefinies ceil()
$nb_page_films=ceil(intval($total_lignes_films)/$perpage_films);

//on recupere des films en respectant le systeme de pagination

$films_propose=$films->get_films($page);
if($films_propose){
//on va afficher tous nos film 
foreach($films_propose as $item){
	echo '<div>';
	//on va recupere limage du film 
	$image=$app->get_table('image')->get_film_image($item->id_film);

	//en affiche le titre du film
	echo '<h5><strong>'.$item->titre.'<strong><h5>';
	//en affiche limage du film voir le fichier imageEntity pour voir la methode affiche_image
	$image->affiche_image();
	echo '<p><a href="?p=detaille&type=film&id='.$item->id_film.'">voir le film</a></p>';

	echo '</div>';
}

}else{
	echo '<div class="alert alert-warning">aucun film disponible pour le moment </div>';
}
//on repete le mem travail pour le systeme de recommendation des serie
$series=$app->get_table('serie');
//recuperer le nombre total des serie
$total_series=$series->total_series();
//le nombre total des films dans la base de donnee
$total_lignes_series=$total_series[0]->total_series;

//on recupere l'attribut perpage de lobjet film pour lituliser dans le systeme de pagination
$perpage_series=$series->perpage;

//on calcule le nombre de page necessaire pour afficher tous nos films dans la base de donne 
//alors on calcule un variable nb_page
//la $total_ligne est de type string alors on va changer au entier avec la fonction predefini intval() est on va arrondir avec la fonction predefinies ceil()
$nb_page_series=ceil(intval($total_lignes_series)/$perpage_series);
$series_propose=$series->get_serie();
if($series_propose){
echo '<h4> Nos Series   </h4>';
echo '<hr>';
foreach($series_propose as $serie){
	echo '<div>';
	//on va recupere limage du serie 
	$image=$app->get_table('image')->get_serie_image($serie->id_serie);

	//en affiche le titre du serie
	echo '<h5><strong>'.$serie->titre_serie.'<strong><h5>';
	//en affiche limage du film voir le fichier imageEntity pour voir la methode affiche_image
	if($image){
	$image->affiche_image();
	}else{
		echo '<p>aucune image pour cet serie</p>';
	}
	echo '<p><a href="?p=detaille&type=serie&id='.$serie->id_serie.'">voir le serie</a></p>';

	echo '</div>';
}
}else{
	echo '<div class="alert alert-warning">aucune serie disponible pour le moment </div>';
}



if($nb_page_series>=$nb_page_films){
	$nb_page=$nb_page_series;
}else{
	$nb_page=$nb_page_films;
}
//on recupere des films en respectant le systeme de pagination
























echo '<hr>';
//en va creer le systeme de pagination
for($i=1; $i<=$nb_page; $i++){
	if($i==$page){
		echo '<span>'.$i.'</span>';
	}else{
		echo '<span><a href="index.php?page='.$i.'">'.$i.'</a></span>';
	}
}

?>