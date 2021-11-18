require "header.php";
?>
<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html lang="en">
<head>
<style>
      table,
      table td {
        border: 1px solid #cccccc;
      }
      td {
        height: 80px;
        width: 80px;
        text-align: center;
        vertical-align: middle;
      }
    </style>
  <meta charset="UTF-8">
  <title>PHP Search</title>
</head>
<body>
<div class="container">
   <div class="row">
   <div class="col-md-8 col-md-offset-2" style="margin-top: 1%;">
   <div class="row">

   <?php 

     $conn = new mysqli('localhost', 'root', '', 'flashcards');
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM subject, card WHERE subject_name LIKE '%$searchKey%' OR question LIKE '%$searchKey%' OR answer LIKE '%$searchKey%' ";
     }else
     $sql = "SELECT * FROM subject, card";
     $result = $conn->query($sql);
   ?>

   <form action="" method="GET"> 
     <div class="col-md-6">
        <input type="text" name="search" class='form-control' placeholder="SetName, Ques, or Answer" value=<?php echo @$_GET['search']; ?> > 
     </div>
     <div class="col-md-6 text-left">
      <button class="btn">Search</button>
     </div>
   </form>

   <br> 
   <br>
</div>

<table class="table table-bordered">
  <tr>
     <th>Set Name</th>
     <th>Question</th>
     <th>Answer </th>
                
  </tr>
  <?php while( $row = $result->fetch_object() ): ?>
  <tr>
     <td><?php echo $row->subject_name ?></td>
     <td><?php echo $row->question?></td>
     <td><?php echo $row->answer ?></td>
  </tr>
  <?php endwhile; ?>
</table>
</div>
</div>
</div>
</body>
</html>
