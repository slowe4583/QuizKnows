<?php 

    require($_SERVER['DOCUMENT_ROOT'] . '/flashcards/core/app.php'); 
    require(APP_ROOT_DIR . '/fragments/header.php');

    // using the $db_conn variable which is initialized in cord/database.php
    // connect to the database and get all the subjects
    $sql = 'SELECT id, subject_name FROM subject';
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
<h1>Subjects - List</h1>

<!-- include the subject_actions, the navigation buttons for the subject pages -->
<?php require(APP_ROOT_DIR . '/pages/subjects/subject_actions.php'); ?>

<?php if($result->num_rows == 0): ?>
    <p>No subjects found!</p>
<?php else: ?>
    <p>Subjects found: <?php echo $result->num_rows; ?></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['subject_name']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

<?php endif; ?>

<!-- include the footer fragment -->
<?php require(APP_ROOT_DIR . '/fragments/footer.php'); ?>