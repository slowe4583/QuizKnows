<?php require("template/header.php"); ?>
<h2>Create A New Card</h2>
<form action="insertCard.php" method="post">
	<label for="fc_name">*Flashcard Title:</label>
	<input id="fc_name" name="fc_name" required="required">
	<label for="fc_desc">*Flashcard Description:</label>
	<textarea id="fc_desc" name="fc_desc" required="required" rows="2" cols="32"></textarea>
	<input type="submit" value="Save">
</form>
<?php require("template/footer.php"); ?>