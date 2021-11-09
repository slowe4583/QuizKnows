<?php 

    require($_SERVER['DOCUMENT_ROOT'] . '/flashcards/core/app.php'); 
    require(APP_ROOT_DIR . '/fragments/header.php');

    // using the $db_conn variable which is initialized in cord/database.php
    // connect to the database and get all the subjects
    // 
    // NOTE!! This query is different from the subject/list.php. It uses an INNER JOIN in order to get the subject name
    // instead of the subject ID that is available in this card row
    // 
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