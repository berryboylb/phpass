
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="pie.css">
</head>
<body>
        <?php
        // include database connection
        include 'config/database.php';
        
        $stmt = $con->prepare("DELETE FROM profile   WHERE email = :email ");

        @$email=htmlspecialchars(strip_tags($_POST['email']));

        
        $stmt->bindParam(':email', $email);
        

        if($stmt->execute()){
            echo "<div> Record was deleted.</div>";
            }else {
                echo "<div> Record was not deleted.</div>";
            }

        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
            <h2>Enter the email  of the record you wish to delete</h2>
            
                
                    <h4>Email</h4>
                    <input type='email' name='email' class='form-control' placeholder = "Email..." />
               
                        <div class = "tweak">
                            <input type='submit' style='margin-top: 2%;' value='Delete' class='btn' />
                            <button type = "reset" style='margin-top: 2%;' class='btnn'><a href='index.php' class='btnn'>Cancel</a></button>
                        </div>
                  
        </form> 
</body>
</html>
