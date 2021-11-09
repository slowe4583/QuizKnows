<?php require 'connect.php';

$fc_id = $_GET["id"];

$sql = "DELETE FROM fc_flashcard WHERE flashcard_id = ?";
$p_stmt = $dbc->prepare($sql);
$p_stmt->bind_param("i", $fc_id);
$status = $p_stmt->execute();
if($status === false){
	$msg = "Card did not delete successfully.";
} else {
	$msg = $fc_name." was deleted successfully.";
}
$p_stmt->close();
$dbc->close();
header("Location: index1.php?msg=".$msg);
die();
?>