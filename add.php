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
     include 'config/database.php';
     if (isset($_POST['submit'])) {
        header('Location: add.php');
        return;
        if(isset($first_name) &&  isset($last_name) && isset($email) && isset($headline) && isset($summary)) {
            if(strlen($first_name)< 1 || strlen($last_name)< 1 ||strlen($email)< 1 || strlen($headline)< 1 || strlen($summary)< 1){
                echo "<h3> Fill all fields properly</h3>";
                header("Location: add.php");
                return;
            }
        }
     }

     if (isset($_POST['cancel'])) {
        header('Location: index.php');
        return;
    }
      $stmt = $con->prepare("INSERT INTO profile (first_name, last_name, email, headline, summary)
                            VALUES (:first_name, :last_name, :email, :headline, :summary) ");
           
           
           @$first_name=htmlspecialchars(strip_tags($_POST['first_name']));
           @$last_name =htmlspecialchars(strip_tags($_POST['last_name']));
           @$email=htmlspecialchars(strip_tags($_POST['email']));
           @$headline=htmlspecialchars(strip_tags($_POST['headline']));
           @$summary=htmlspecialchars(strip_tags($_POST['summary']));

           $stmt->bindParam(':first_name', $first_name);
           $stmt->bindParam(':last_name', $last_name);
           $stmt->bindParam(':email', $email);
           $stmt->bindParam(':headline',  $headline);
           $stmt->bindParam(':summary', $summary); 

           if($stmt->execute()){
            echo "<div> Record was saved.</div>";
            }else {
                echo "<div> Record was not saved.</div>";
            }
    ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
            <h2>Adding records for Berrycorp</h2>
            
                    <h4>Firstname</h4>
                    <input type='text' name='first_name' placeholder ="Enter your Firstname..."  />
                
                    <h4>Lastname</h4>
                    <input type='text' name='last_name' placeholder ="Enter your Lastname..."  />
                
                    <h4>Email</h4>
                    <input type='email' name='email' placeholder ="Enter your Email..."  />
                
                    <h4>Headline</h4>
                    <input type='text' name='headline' placeholder ="Enter A title..."  />
                
                    <h4>Summary</h4>
                    <textarea name='summary' placeholder ="fill in details..."  ></textarea>
                
                       <div class = "tweak"> <input type='submit' value='Add' class='btn' />
                        <button type = "reset" class='btnn'><a href='index.php' >Cancel</a></button></div>
                    
            
        </form> 
</body>
</html>

