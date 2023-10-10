<?php require "header.php"; ?>

<main id="comments">

	<div>		
		<h2 class="generalTitle">LES COMMENTAIRES</h2>				

		<button class="button" id="addComment">AJOUTER UN COMMENTAIRE<br /><i class="fas fa-angle-down" id="faAngle"></i></button>

		<form id="commentForm" action="" method="post">
		
			<div class="field contactInformations">
				<label for="pseudo">Votre pseudo</label>
				<input type="text" name="pseudo" id="pseudo" value="" />
			</div>

			<div class="field">
				<label for="content">Votre commentaire</label>
				<textarea name="content" id="content"></textarea>
			</div>
			
			<div><input type="submit" name="send" class="button" value="Envoyer" /></div>

		</form>
	</div>

	<img src="../public/images/image1.JPG" alt="image1" />
</main>	

<?php require "footer.php"; ?>