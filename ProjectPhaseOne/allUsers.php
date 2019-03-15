<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Christopher Ermel</title>
      <!--Style Sheet Links-->
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/main.css">
      <!-- Below is used to set the 1x1 ratio and remove default phone functionality -->
      <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="HandheldFriendly" content="true">
   </head>
   <body>
      <div id = 'main'>
         <?php
            try {
              //db connect
              require ('db/db.php');
              //query
              $sql = "SELECT * FROM users";
              //prepare
              $cmd = $conn->prepare($sql);
              //execute
              $cmd->execute();
              //fetchAll results
              $allUsers = $cmd->fetchAll();
            
              echo '
              <div class = "mainContent">
                      <table class="table">
                        <thead>
            
                            <th> Name </th>
                            <th> Email </th>
                            <th> City </th>
                            <th> Skills </th>
                        </thead>
                      </div>
                    <tbody>';
            
              //loop through the data and create tables
              foreach ($allUsers as $allUser) {
                echo '<tr><td>' . $allUser['name'] . '</td>';
                echo '<td>' . $allUser['email'] . '</td>';
                echo '<td>' . $allUser['city'] . '</td>';
                echo '<td>' . $allUser['skills'] . '</td></tr>';
              }
            echo '</tbody></table>';
            
            $cmd->closeCursor();
            }
            catch(PDOException $e){
            
            }
            ?>
         <div class = 'mainHeading'>
            <h2>All Users:</h2>
            <div class = 'mainHeadingInfo'>
               <p>Above is the Full list of every user on this site and their skills!</p>
            </div>
         </div>
      </div>
      <div class = 'mainSidebar'>
         <!--The main Side Bar Content of the page is here (right side)-->
         <div class = 'mainLinkBox'>
            <!--This is used for the links of the sidebar-->
            <a href="./allUsers.php">-----All Users-----</a>
            <a href="./form.php">-----Form-----</a>
            <a href="./myid.php">-----My ID-----</a>
            <a href="./about.php">-----About-----</a>
            <a href="./index.php">-----Home-----</a>
         </div>
      </div>
    </body>
   </body>
</html>