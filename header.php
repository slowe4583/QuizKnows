
 <div class="topNav"div>
 <a class="active" href="../index.php">Home</a>
 <a class="active" href="../search.php">Search</a>
 <a class="active" href="../mySets.php">My Sets</a>
 <a class="active" href="../logOut.php">Logout</a>
     <?php
     require_once "auth.php";
     echo $_SESSION["isAdmin"];
     if ($_SESSION["isAdmin"] == "1")
     {

         echo "<a class='active' href='../adminLog.php'>Admin Log</a>";
     }
     ?>
 </div>


