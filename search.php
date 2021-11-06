<?php
require "header.php";
?>
<!DOCTYPE html>
<html>
<head>
   <title>Search</title>
   <!-- Including jQuery is required. -->
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="script.js"></script>
   <!-- Including CSS file. -->
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- Search box. -->
   <input type="text" id="search" placeholder="Search" />
   <br>
   <b>Ex: </b><i>Chance, Gillian, Steven, Kristi </i>
   <br />
   <!-- Suggestions will be displayed in below div. -->
   <div id="display"></div>
</body>
</html>