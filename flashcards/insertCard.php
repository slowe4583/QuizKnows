<?php require 'connect.php';

$fc_name = $_POST["fc_name"];
$fc_desc = $_POST["fc_desc"];

$sql = "INSERT INTO fc_flashcard (flashcard_name, flashcard_desc) VALUES (?, ?)";
$p_stmt = $dbc->prepare($sql);
$p_stmt->bind_param("ss", $fc_name, $fc_desc);
$status = $p_stmt->execute();
if($status === false){
	$msg = "Card did not insert successfully.";
} else {
	$msg = $fc_name." was inserted successfully.";
}
$p_stmt->close();
$dbc->close();
header("Location: index1.php?msg=".$msg);
die();
?>