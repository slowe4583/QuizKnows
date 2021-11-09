<?php require("template/header.php");
	require ("connect.php");
	$fc_id = $_GET['id'];
	$sql = "SELECT flashcard_name, flashcard_desc FROM fc_flashcard WHERE flashcard_id=?";
	$stmt = $dbc->prepare($sql);
	$stmt->bind_param("i", $fc_id);
	$stmt->execute();
	$stmt->bind_result($fc_name, $fc_desc);
	if($row = $stmt->fetch()){
?>
<h2>Edit A Card</h2>
<form action="updateCard.php" method="post">
	<label for="fc_name">*Flashcard Title:</label>
	<input id="fc_name" name="fc_name" value="<?= $fc_name ?>" />
	<label for="fc_desc">*Description:</label>
	<textarea id="fc_desc" name="fc_desc"><?= $fc_desc ?></textarea>
	<input type="hidden" name="fc_id" value="<?= $fc_id ?>" />
	<input type="submit" />
</form>
<?php
	}
	$stmt->close();
	$dbc->close();
	require("template/footer.php");
?>