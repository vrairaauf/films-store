
<div>
<?php
if(isset($_POST['submit'])){

	if(!empty($_POST['titre_film']) AND !empty($_POST['description']) AND !empty($_POST['lien']) ){

		$app=App::get_instance();
		$film=$app->get_table('film')->ajouter_film($_POST['titre_film'], $_POST['description'], $_POST['lien']);
		$film=$app->get_table('film')->get_last_film();
		
		if(!empty($_FILES['image'])){
			move_uploaded_file($_FILES['image']['tmp_name'], '../app/views/medias/images/'.$_FILES['image']['name']);
			$ajout_image=$app->get_table('image')->ajouter_image_film($_FILES['image']['name'], $film[0]->id_film);
		}
		if(!empty($_FILES['trailer'])){
			move_uploaded_file($_FILES['trailer']['tmp_name'], '../app/views/medias/video/'.$_FILES['trailer']['name']);
			$ajout_trailer=$app->get_table('trailer')->ajouter_trailer_film($_FILES['trailer']['name'], $film[0]->id_film);
		}

	}
}
?>

	<form method="post" enctype="multipart/form-data">
		<p><input type="text" name="titre_film" placeholder="titre de film"></p>
		
		<p>
			<textarea name="description">
				
			</textarea>
		</p>
		<p><input type="text" name="lien" placeholder="lien de téléchargement"></p>
		<p><input type="file" name="image">    : image</p>
		<p><input type="file" name="trailer">    : trailer</p>
		<hr>
		<p><input type="submit" name="submit" value="ajouter"></p>
	</form>
</div>