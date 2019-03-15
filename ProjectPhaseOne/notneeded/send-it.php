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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>
<body>
    <div id = 'main'>
        <div class = 'mainContent'> <!--The main Content of the page is here (left side)-->
            <?php
                  try {
                    if(isset($_POST['submit'])){
                    
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $city = $_POST['city']; 
                    $skills = $_POST['skills'];
                    
                    if(!empty($name) || !empty($email) || !empty($city) || !empty($skills)) {
                    
                    require ('db/db.php');
                      
                    $sql = "INSERT INTO users(name, email, city, skills) VALUES (:name, :email, :city, :skills)";
                      
                    $cmd = $conn->prepare($sql); 
                    
                    $cmd->bindParam(':name', $name);
                    $cmd->bindParam(':email', $email); 
                    $cmd->bindParam(':city', $city); 
                    $cmd->bindParam(':skills', $skills); 
                      
                    $cmd->execute(); 
                      
                    echo "<p> Thanks for sharing your fave tune with the interwebs!</p>";
                      
                    $cmd->closeCursor();  
                    }
                  }
                }
                catch(PDOException $e) {
                  echo $e; 
                  // echo "<p> There was an error with your form submission </p>"; 
                  // mail('200250446@student.georgianc.on.ca', 'app submission error', $e); 
                }
              ?>
        </div>
        <div class = 'mainSidebar'><!--The main Side Bar Content of the page is here (right side)-->
            <div class = 'mainLinkBox'><!--This is used for the links of the sidebar-->
              <a href="./app.php">-----App-----</a>
              <a href="#">-----Services-----</a>
              <a href="#">-----Clients-----</a>
              <a href="#">-----Contact-----</a>
        </div>
    </div>

</body>
</html>
