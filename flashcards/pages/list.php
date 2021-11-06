<?php 
/**
 * Used to select all the rows in the card table and display them to the user.
 */

    require($_SERVER['DOCUMENT_ROOT'] . '/flashcards/core/app.php'); 
    require(APP_ROOT_DIR . '/fragments/header.php');
    $sql = 'SELECT card.id, card.question, card.answer, subject.subject_name FROM card INNER JOIN subject ON card.subject_id = subject.id';
    $result = $db_conn->query($sql);
    if($db_conn->error){
        print_r($db_conn->error);
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
<h1>Cards - List</h1>

<!-- include the card_actions, the navigation buttons for the cards pages -->
<?php require(APP_ROOT_DIR . '/pages/cards/card_actions.php'); ?>

<?php if($result->num_rows == 0): ?>
    <p>No cards found!</p>
<?php else: ?>
    <p>Subjects found: <?php echo $result->num_rows; ?></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Subject Name</th>
            <th>Question</th>
            <th>Answer</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['subject_name']; ?></td>
                <td><?php echo $row['question']; ?></td>
                <td><?php echo $row['answer']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

<?php endif; ?>

<!-- include the footer fragment -->
<?php require(APP_ROOT_DIR . '/fragments/footer.php'); ?>