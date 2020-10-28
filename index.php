<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daramola Olorunfemi winner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
            include 'config/database.php';
              session_start();
              //i cant flash the session messages here so i hid the error
              $message = "<h3>Welcome</h3>" . " ".$_SESSION['name'];
              echo $message.'<br><br><br><br>';

            $stmt = $con-> query("SELECT * FROM profile");

            $records = $stmt->fetchAll();
            echo "<a href='add.php'  class='create' style='margin-left: 70%; position: absolute; top: 15px; background: rgb(109, 133, 109) !important;
            color: white !important; padding: 1%; border-radius: 5px; margin-bottom: 1000%;'>Create New Post</a>";
            echo "<a href='logout.php'  class='create' style='margin-left: 85%; position: absolute; top: 15px; background: rgb(109, 133, 109) !important;
            color: white !important; padding: 1%; border-radius: 5px; margin-bottom: 1000%;'>Logout</a>";

            foreach ($records as $row) {
                $profile_id = htmlentities($row['0']);
                $user_id = htmlentities($row['1']);
                $first_name = htmlentities($row['2']);
                $last_name  = htmlentities($row['3']);
                $email = htmlentities($row['4']);
                $headline =  htmlentities($row['5']);
                $summary = htmlentities($row['6']);

                echo "<div class ='container'>";
                    echo "<table class = 'table'>";
                        echo "<tr>";
                            echo "<th>User_id </th>";
                            echo "<th>first_name</th>";
                            echo "<th>last_name</th>";
                            echo "<th>email </th>";
                            echo "<th>headline</th>";
                            echo "<th class = 'summary'>summary</th>";
                            echo "<th>Edit</th>";
                            echo "<th>Read More</th>";
                            echo "<th>Delete</th>";
                        echo "</tr>";

                        echo "<tr>";
                                echo "<td>{$profile_id}</td>";
                                echo "<td>{$first_name}</td>";
                                echo "<td>{$last_name}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$headline}</td>";
                                echo "<td class = 'summary'>{$summary}</td>";
                                echo "<td><a href='edit.php?profile_id={$profile_id}'>Edit</a></td>";
                                echo "<td><a href='view.php?profile_id={$profile_id}'>Read More</a></td>";
                                echo "<td><a href='#' onclick='delete_user({$email});'>Delete</a></td>";
                        echo "<tr>";
                echo "</table>";
                echo "</div>";

                
              
            }
    
?>
    

     <script type='text/javascript'>
            // confirm record deletion
            function delete_user( user_id ){
                
                var answer = confirm('Do you want to delete this record?');
                if (answer){
                    // if user clicked ok, 
                    // pass the id to delete.php and execute the delete query
                    window.location = 'delete.php?id=' + user_id;
                } 
            }
    </script>
</body>
</html>