<?php require "header.php"; ?>

<main id="comments">

	<div>		
		<h2 class="generalTitle">LES COMMENTAIRES</h2>				

		<button class="button" id="addComment">AJOUTER UN COMMENTAIRE<br /><i class="fas fa-angle-down" id="faAngle"></i></button>

		<form id="commentForm" action="comments.php?action=addComment" method="post">
		
			<div class="field">
				<label for="pseudo">Votre pseudo</label>
				<input type="text" name="pseudo" id="pseudo" value="" />
			</div>

			<div class="field">
				<label for="commentary">Votre commentaire</label>
				<textarea name="commentary" id="commentary"></textarea>
			</div>
			
			<div><input type="submit" name="send" class="button" value="Envoyer" /></div>

		</form>
	</div>

	<?php



/* NEW COMMENT */
function postComment($pseudo, $commentary) {
	$db = dbConnect();
	$content = $db->prepare("INSERT INTO comments (pseudo, commentary) VALUES (?, ?, ?)");
	$newComment=$content->execute(array($pseudo, $commentary));
	return $newComment;
}

/* SEE ALL COMMENTS */
function displayComments () {
	$db = dbConnect();
	$req=$db->query("SELECT pseudo, commentary, DATE_FORMAT(dated, ', le %d/%m/%Y à %H:%i') AS creationDate  FROM comments ORDER BY id DESC");
	$allComments = $req;
	return $allComments;
}

/* CALL TO DATABASE */

function dbConnect() {
	try {
			$db  = new PDO('mysql:host=localhost;dbname=commentsprojectstudi;charset=utf8', 'freynaut', 'admin2018');
			return $db;
		}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
		}
	}

function addComment($pseudo, $commentary) {
	$newComment = postComment($pseudo, $commentary);
	if ($newComment === false) {
        die("Impossible d'ajouter le commentaire !");
    }
    else {
        header("Location: comments.php?action=viewComments");
    }
}

function viewComments ($errorMessage) {
	$error = $errorMessage;
	$reqAllComments = displayComments();
}

?>

<?php 

$pseudo = htmlspecialchars($_POST["pseudo"]);
$commentary = htmlspecialchars($_POST["commentary"]);

?>

	<img src="../public/images/image1.JPG" alt="image1" />
</main>	

<?php require "footer.php"; ?>