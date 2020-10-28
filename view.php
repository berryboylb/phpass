<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daramola Olorunfemi Winner</title>

    <style>
        body {
            background-color: #4CAF50;
            color: white;
        }
        .container {
            width: 95%;  
            margin-top: 5%; 
            padding: 2%; 
            border-radius: 15px; 
            border: 1px solid grey;  
            box-shadow: 5px 10px #888888;
        }
        .id {
            background: grey;
            width: 2%;
            padding: 0.5%;
            border-radius: 5px;
        }

        .names{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .names h3 {
            font-size: 40px;
            text-transform: uppercase;
        }

        .email {
            text-align: center;
            font-size: 30px;
        }

        .headline {
            text-align: center;
            margin-top: 2%;
            text-decoration: underline;
            font-size: 30px;
            text-transform: uppercase;
            color: gold;
        }
        .summary {
            font-size: 25px;
            text-transform: capitalize;
            line-height: 1.5;
        }
        .btn {
            position: absolute;
            right: 10%;
            bottom: 2%;
            color: #fff;
            text-decoration: none;
            background: gold;
            padding: 0.5%;
            font-size: 20px;
            border-radius: 10px;
        }
        .btn:hover {
            background: grey;
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <?php
          $profile_id=isset($_GET['profile_id']) ? $_GET['profile_id'] : die('ERROR: Record id  not found.');
            
          
          include 'config/database.php';

          try {
            // prepare select query
            $query = "SELECT  profile_id, first_name, last_name, email, headline, summary FROM profile WHERE profile_id = ? LIMIT 0,1";
            $stmt = $con->prepare( $query );
        
            // this is the first question mark
            $stmt->bindParam(1,  $profile_id);
        
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

        <div class='container'>
            
                
            <h2 class= 'id' ><?php echo htmlspecialchars( $profile_id, ENT_QUOTES);  ?></h2>      
            <div class='names'>
                <h3><?php echo htmlspecialchars($first_name, ENT_QUOTES);  ?></h3>    
                <h3 ><?php echo htmlspecialchars($last_name, ENT_QUOTES);  ?></h3>
            </div>

            <h4 class= 'email'><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></h4>
            <h4 class= 'headline' ><?php echo htmlspecialchars( $headline, ENT_QUOTES);  ?></h4>
            <h4 class='summary'><?php echo htmlspecialchars($summary, ENT_QUOTES);  ?></h4>
    
          
                
                
                    
                    
                        <a href='index.php' class='btn '>Back</a>
                    
                
            </div>
</body>
</html>