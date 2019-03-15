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
      <div class = 'mainContent'>
         <!--The main Content of the page is here (left side)-->
         <div class = 'contentBox'>
            <form method="post" action="selector.php">
               <div class="form-group">
                  <input type="number" name="id" class="form-control" placeholder="Your ID #" size="50">
               </div>
               <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
         </div>
         <div class = 'mainHeading'>
            <h2>MyID:</h2>
            <div class = 'mainHeadingInfo'>
               <p>Please input your UNIQUE ID; You will then be able to View, Edit, and Delete your record.</p>
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
  </div>
   </body>
</html>