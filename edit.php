<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daramola Olorunfemi Winner</title>
    <link rel="stylesheet" href="pie.css">
</head>
<body>

<?php
            
            $profile_id=isset($_GET['profile_id']) ? $_GET['profile_id'] : die('ERROR: Record id  not found.');
            
            //include database connection
            include 'config/database.php';
            
            // read current record's data
            try {
                // prepare select query
                $query = "SELECT profile_id, first_name, last_name, email, headline, summary FROM profile WHERE profile_id = ? LIMIT 0,1";
                $stmt = $con->prepare( $query );
                
                // this is the first question mark
                $stmt->bindParam(1, $profile_id);
                
                // execute our query
                $stmt->execute();
                
                // store retrieved row to a variable
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // values to fill up our form
                $profile_id = $row['profile_id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $headline = $row['headline'];
                $summary = $row['summary'];
            }
            
            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
            ?>
 
 <?php
 
 // check if form was submitted
 if($_POST){
      
     try{
      
         $query = "UPDATE profile
                     SET profile_id=:profile_id, first_name=:first_name, last_name=:last_name, email=:email, headline=:headline, summary=:summary  
                     WHERE profile_id = :profile_id";
  
         
         $stmt = $con->prepare($query);
  
         // posted values
         $first_name=htmlspecialchars(strip_tags($_POST['first_name']));
         $last_name=htmlspecialchars(strip_tags($_POST['last_name']));
         $email=htmlspecialchars(strip_tags($_POST['email']));
         $headline=htmlspecialchars(strip_tags($_POST['headline']));
         $summary=htmlspecialchars(strip_tags($_POST['summary']));
  
         // bind the parameters
         $stmt->bindParam(':first_name', $first_name);
         $stmt->bindParam(':last_name', $last_name);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':headline', $headline);
         $stmt->bindParam(':summary', $summary);
         $stmt->bindParam(':profile_id', $profile_id);
          
         // Execute the query
         if($stmt->execute()){
             echo "<div class='message'>Record was updated.</div>";
         }else{
             echo "<div class='message0'>Unable to update record. Please try again.</div>";
         }
          
     }
      
     // show errors
     catch(PDOException $exception){
         die('ERROR: ' . $exception->getMessage());
     }
 }

 if (isset($_POST['cancel'])) {
    header('Location: edit.php');
    return;
}
 ?>
 


    
       
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
            <h2>Adding Records for Berrycorp</h2>
                
                    <h4>Firstname</h4>
                    <input type='text' name='first_name' value="<?php echo htmlspecialchars($first_name, ENT_QUOTES);  ?>"  /></td>
                
                    <h4>Lastname</h4>
                    <input type='text' name='last_name' value="<?php echo htmlspecialchars($last_name, ENT_QUOTES);  ?>"  />
            
                
                    <h4>Email</h4>
                    <input type='email' name='email' value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>"  />
              
                    <h4>Headline</h4>
                    <input type='text' name='headline'  value="<?php echo htmlspecialchars($headline, ENT_QUOTES);  ?>"/>
                
                    <h4>Summary</h4>
                    <textarea name='summary' placeholder ="fill in details..."  ><?php echo htmlspecialchars($summary, ENT_QUOTES);  ?></textarea>
                
                    
                    <div class = "tweak"> <input type='submit' value='Add' class='btn' />
                        <button type = "reset" class='btnn'><a href='index.php' >Cancel</a></button>
                </div>
        </form> 

</body>
</html>