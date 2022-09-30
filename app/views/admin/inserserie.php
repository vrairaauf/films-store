
<div>
<?php
if(isset($_POST['submit'])){
	if(!empty($_POST['titre_serie']) AND !empty($_POST['description']) AND !empty($_POST['lien']) AND !empty($_POST['episode'])){

		$app=App::get_instance();
		$film=$app->get_table('serie')->ajouter_serie($_POST['titre_serie'], $_POST['episode'], $_POST['description'], $_POST['lien']);
		$serie=$app->get_table('serie')->get_last_serie();
		var_dump($serie);
		
		if(!empty($_FILES['image'])){
			move_uploaded_file($_FILES['image']['tmp_name'], '../app/views/medias/images/'.$_FILES['image']['name']);
			$ajout_image=$app->get_table('image')->ajouter_image_serie($_FILES['image']['name'], $serie[0]->id_serie);
		}
		if(!empty($_FILES['trailer'])){
			move_uploaded_file($_FILES['trailer']['tmp_name'], '../app/views/medias/video/'.$_FILES['trailer']['name']);
			$ajout_trailer=$app->get_table('trailer')->ajouter_trailer_serie($_FILES['trailer']['name'], $serie[0]->id_serie);
		}

	}
}
?>

	<form method="post" enctype="multipart/form-data">
		<p><input type="text" name="titre_serie" placeholder="titre de serie"></p>
		<p><input type="text" name="episode" placeholder="episode"></p>
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