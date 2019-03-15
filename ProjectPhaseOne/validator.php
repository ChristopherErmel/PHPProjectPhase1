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
            <?php
               $id = null;
               $lastId = null;
               $sendId = false;
               if(isset($_POST['submit'])){
               
               $id = $_POST['id'];
               $name = $_POST['name'];
               $email = $_POST['email'];
               $city = $_POST['city']; 
               $skills = $_POST['skills'];
               $nameCheck=false;
               $emailCheck=false;
               $cityCheck=false;
               $skillsCheck=false;
               $nameFailed=false;
               $emailFailed=false;
               $cityFailed=false;
               $skillsFailed=false;
               
                 if (!empty($name) && preg_match('/^[a-zA-Z ]+$/i', $name) && strlen($name) > 0 && strlen(trim($name)) !== 0){ //checks to see if name is empty and if it contains only letters and spaces and that its not just a whitespace.
                   $nameCheck=true;
                 }
                 else{$nameCheck=false;
               
                  $nameFail = "<div class = 'mainHeadingInfo'> <p>NameFeild:Only Letters and Spaces Allowed!(Cannot be empty)</p></div>";//used for error messages...
                   $nameFailed = true;
                  }
               
                 if (!empty($email && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ){ //checks to see is email is empty and if it is a valid email address. 
                   $emailCheck=true;
                 }
                 else{$emailCheck=false;
               
                     $emailFail = "<div class = 'mainHeadingInfo'> <p>EmailFeild:Must Contain a Valid Email(example@exmaple.com)!</p></div>";//used for error messages...
                     $emailFailed = true;                       
                 }
               // && preg_match('/^[a-zA-Z ]+$/i', $city)
                 if (!empty($city) && preg_match('/^[a-zA-Z ]+$/i', $city) && strlen($city) > 0 && strlen(trim($city) !== 0)){ //checks to see is city is empty and if it contains only letters and spaces and that is not just whitespace. 
                   $cityCheck=true;
                 }
                 else{$cityCheck=false;
               
                   $cityFail = "<div class = 'mainHeadingInfo'> <p>CityFeild:Only Letters and Spaces Allowed!(Cannot be empty)</p></div>";//used for error messages...
                   $cityFailed = true;                     
                 }
                 if (!empty($skills) && strlen($skills) > 0 && strlen(trim($skills)) !== 0){ //checks to see if skills is empty and if it contains only letters and spaces. 
                   $skillsCheck=true;
                 }
                 else{$skillsCheck=false;
               
                   $skillsFail = "<div class = 'mainHeadingInfo'> <p>SkillsFeild:Can Not Be Empty(We know you have skills)!</p></div>"; //used for error messages...
                   $skillsFailed = true;
                 }                   
               //($nameCheck==true && $emailCheck==true && $cityCheck=true && $skillsCheck==true)
               if ($nameCheck==true && $emailCheck==true && $cityCheck==true && $skillsCheck==true) {
               
               require ('db/db.php');
               
               if(!empty($id)){ //check if this is an update or a new submission
               
                 $sql = "UPDATE users SET name = :name, email = :email, city = :city, skills = :skills WHERE id = :id";
                 $lastId = $id;
                 
               }
               else {
                 
               $sql = "INSERT INTO users(name, email, city, skills) VALUES (:name, :email, :city, :skills)";
               $sendId = true; //to send the original id if needed instead of looking for a new one.
               
               
               }
               
               $cmd = $conn->prepare($sql); 
               
               if(!empty($id)){ //needs the old id if its an update...
               $cmd->bindParam(':id', $id);
               }
               
               $cmd->bindParam(':name', $name);
               $cmd->bindParam(':email', $email); 
               $cmd->bindParam(':city', $city); 
               $cmd->bindParam(':skills', $skills); 
               
               $cmd->execute();
               
               if($sendId == true){
               $stmt = $conn->query("SELECT LAST_INSERT_ID()");
               $lastId = $stmt->fetchColumn();
               }
               
               echo "
               <div class = 'mainContentNumber'>
               <p>ID#$lastId</p>
               </div>
               <div class = 'mainContentInfo'>
               <h3>Remember Your ID!</h3>
               <p>You MUST have your ID in order to View, Edit, and Delete your personal record.</p>
                 </div>
               ";
               
               if($sendId == true){
                 echo "<div class = 'mainHeading'> <p>Submission Recived: </p>"; //if there were any errors display the 
               }
               else {
                 echo "<div class = 'mainHeading'> <p>Your Record has been Updated: </p>"; //if there were any errors display the 
               }
               echo "<div class = 'mainHeadingInfo'> <p>Thanks for the submission!</p></div>";
               echo "<div class = 'mainHeadingInfo'> <p>----------------------------------</p></div>";
               echo "<div class = 'mainHeadingInfo'> <p>Info About: ",$name,"</p></div>";
               echo "<div class = 'mainHeadingInfo'> <p>----------------------------------</p></div>";
               echo "<div class = 'mainHeadingInfo'> <p>Email: ",$email,"</p></div>";
               echo "<div class = 'mainHeadingInfo'> <p>City: ",$city,"</p></div>";
               echo "<div class = 'mainHeadingInfo'> <p>Skills: ",$skills,"</p></div>";
               
               
               $cmd->closeCursor();
               }
               else {
                   echo "<div class = 'mainHeading'> <p>Submission Error: </p>"; //if there were any errors display the messages.
                   if ($nameFailed == true) {echo $nameFail;}
                   if ($emailFailed == true) {echo $emailFail;}
                   if ($cityFailed == true) {echo $cityFail;}
                   if ($skillsFailed == true) {echo $skillsFail;}
                }              
               }              
               ?>
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
      </div>
      </div>
   </body>
</html>