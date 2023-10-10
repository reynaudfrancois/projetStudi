<?php require "header.php"; ?>

<?php

/* CALL TO DATABASE */
function dbConnect() {
	try {
		$db  = new PDO("mysql:host=localhost;dbname=projetstudi;charset=utf8", "freynaut", "admin2018");
		return $db;
	} catch(Exception $e) {
		die("Erreur : ".$e->getMessage());		
	}

/* NEW COMMENT */
function postComment($pseudo, $email, $comment) {
	$db = dbConnect();
	$content = $db->prepare("INSERT INTO comments (pseudo, email, comment) VALUES (?, ?, ?)");
	$newComment=$content->execute(array($pseudo, $email, $comment));
	return $newComment;
}

function displayComments () {
	$db = dbConnect();
	$req=$db->query("SELECT pseudo, comment, DATE_FORMAT(dated, ', le %d/%m/%Y à %H:%i') AS creationDate  FROM comments ORDER BY id DESC");
	$allComments = $req;
	return $allComments;
}

?>

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