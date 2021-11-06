<?php 
/**
 * pages/subjects/read.php
 * 
 * Used to read, or retrieve, the details of a subject.
 * Selects the row from the subject table by it's ID.
 * 
 */
    require($_SERVER['DOCUMENT_ROOT'] . '/flashcards/core/app.php'); 
    require(APP_ROOT_DIR . '/fragments/header.php');

    // Only do the following if the FORM action was a POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // get the value from the POST form
        $posted_subject_id = $_POST['subject_id'];
        $sql = "SELECT * FROM subject WHERE id=". $posted_subject_id .";";
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
<h1>Subjects - Read</h1>

<!-- include the subject_actions, the navigation buttons for the subject pages -->
<?php require(APP_ROOT_DIR . '/pages/subjects/subject_actions.php'); ?>

<p>Use the form below to search for a subject by the ID.</p>

<form action="" method="post">
    Subject Id: <input type="text" name="subject_id"><br>
    <input type="submit">
</form>



<?php if(!empty($result) && $result->num_rows > 0): ?>
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
<?php else: ?>
    <p>No subject found!</p>
<?php endif; ?>

<!-- include the footer fragment -->
<?php require(APP_ROOT_DIR . '/fragments/footer.php'); ?>