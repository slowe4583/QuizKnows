<?php 
/**
 * pages/cards/read.php
 * 
 * Used to read, or retrieve, the details of a card.
 * Selects the row from the card table by it's ID.
 * 
 */
    require($_SERVER['DOCUMENT_ROOT'] . '/flashcards/core/app.php'); 
    require(APP_ROOT_DIR . '/fragments/header.php');

    // Only do the following if the FORM action was a POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // get the value from the POST form
        $posted_card_id = $_POST['card_id'];
        $sql = "SELECT * FROM card WHERE id=". $posted_card_id .";";
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
<h1>Cards - Read</h1>

<!-- include the card_actions, the navigation buttons for the card pages -->
<?php require(APP_ROOT_DIR . '/pages/cards/card_actions.php'); ?>

<p>Use the form below to search for a card by the ID.</p>

<form action="" method="post">
    Card Id: <input type="text" name="card_id"><br>
    <input type="submit">
</form>



<?php if(!empty($result) && $result->num_rows > 0): ?>
  <p>Subjects found: <?php echo $result->num_rows; ?></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Subject ID</th>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['subject_id']; ?></td>
                <td><?php echo $row['question']; ?></td>
                <td><?php echo $row['answer']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No card found!</p>
<?php endif; ?>

<!-- include the footer fragment -->
<?php require(APP_ROOT_DIR . '/fragments/footer.php'); ?>