<?php 
    require($_SERVER['DOCUMENT_ROOT'] . '/flashcards/core/app.php'); 
    require(APP_ROOT_DIR . '/fragments/header.php');

    // Only do the following if the FORM action was a POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // get the value from the POST form
        $posted_card_id = $_POST['card_id'];
        $posted_subject_id = $_POST['subject_id'];
        $posted_question = $_POST['question'];
        $posted_answer = $_POST['answer'];
        
        // Update the row where the card_id == $posted_card_id
        $sql = "UPDATE card set subject_id='" . $posted_subject_id . "'";
        $sql .= ", question='" . $posted_question . "'";
        $sql .= ", answer='" . $posted_answer . "'";
        $sql .= " WHERE id=". $posted_card_id .";";
        $result = $db_conn->query($sql);
        if($db_conn->error){
            print_r($db_conn->error);
        }
    }
?>
<style>
    a {
  background-color: black;
  color: white;
  padding: 1em 1em;
  text-decoration: none;
  text-transform: uppercase;
}
    </style>
<body style="background-color:#0FC1D3;text-align:left">
<h1>Cards - Update</h1>

<!-- include the card_actions, the navigation buttons for the card pages -->
<?php require(APP_ROOT_DIR . '/pages/cards/card_actions.php'); ?>

<p>Use the form below to update a card.</p>

<form action="" method="post">
    Card ID: <input type="text" name="card_id"><br>
    Subject ID: <input type="text" name="subject_id"><br>
    Question: <input type="text" name="question"><br>
    Answer: <input type="text" name="answer"><br>
    <input type="submit">
</form>

<?php 
if(!empty($result) && $result == TRUE){
  // the row was updated
  echo "<p>Card successfully updated!</p>";
}
?>

<!-- include the footer fragment -->
<?php require(APP_ROOT_DIR . '/fragments/footer.php'); ?>