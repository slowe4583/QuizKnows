<?php require 'connect.php';

$fc_id = $_POST["fc_id"];
$fc_name = $_POST["fc_name"];
$fc_desc = $_POST["fc_desc"];


$sql = "UPDATE fc_flashcard SET flashcard_name=?, flashcard_desc=? WHERE flashcard_id =?";
$p_stmt = $dbc->prepare($sql);
$p_stmt->bind_param("ssi", $fc_name, $fc_desc, $fc_id);
$status = $p_stmt->execute();
if($status === false){
	$msg = "Card did not edit successfully.";
} else {
	$msg = $fc_name." was editted successfully.";
}
$p_stmt->close();
$dbc->close();
header("Location: index1.php?msg=".$msg);
die();
?>