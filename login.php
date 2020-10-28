
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daramola olorunfemi Winner</title>
    <style>
        body {
            background-color: #4CAF50;
            color: white;
        }
        .message {
        padding: 1%;
        background-color: lightgreen !important;
        border-radius: 5px;
        width: 20%;
    }
    form {
        display: block;
    }
    input {
        width: 90%;
        padding: 1%;
        border-radius: 10px;
        outline: none;
        border: none;
    }
    label {
        font-size: 20px;
        display: block;
        margin-top: 2%;
        margin-bottom: 1%;

    }
    #sub {
        margin-top: 2%; 
        width: 30%;
        padding: 0.5;
        margin-left: 30%;
        background-color: cadetblue;
        color: #fff;
    }
    button {
        margin-top: 2%; 
        width: 30%;
        padding: 1%;
        margin-left: 30%;
        border-radius: 10px;
        border: none;
        background-color: cadetblue;
        color: #fff;
    }
    </style>
</head>
    <?php
    //required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
        
        require_once('config/database.php');

        $name = "Alfred Marshal";
        $email = "johndoe@gmail.com";
        $password = "eleribu1";
        
        session_start();
        //unset($_SESSION['Message']);
        //unset($_SESSION['name']);
        //unset($_SESSION['user_id']);
        
        

        @$uemail =  htmlspecialchars(strip_tags($_POST['email']));
        @$upassword =  htmlspecialchars(strip_tags($_POST['password']));

        if(isset($_POST['submit'])) {
            
            
            if ( strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1 ) {
                $_SESSION['error'] = "fill both fields";
                header("Location: login.php");
                return;
            }
      
            if( $_POST['email'] == $email && $_POST['password'] == $password){

                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['password'] = $password;
                header('Location: index.php');
                return;
            }
            else {
                echo "<div class='message'>Inavlid email or Password</div>";
                
            }
        }

        if (isset($_POST['cancel'])) {
            header('Location: index.php');
            return;
        }

        // $salt = 'XyZzy12*_';

        

        //     $check = hash('md5', $salt.$_POST['password']);
        //     $stmt = $con->prepare('SELECT user_id, name FROM users WHERE email =:email AND password = :password');
        //     $stmt->execute(array(':email' => $_POST['email'], ':password' => $check));
        //     $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //     if ($row !== false) {
        //         $_SESSION['name'] = $row['name'];
        //         $_SESSION['user_id'] = $row ['user_id'];
        //         $_SESSION['Message']= 'Welcome'. " ". $_SESSION['name'];
        //         header("Location: index.php");
        //         return;
        //     } else {
        //         $_SESSION['error'] = "Incorrect Password";
        //         header("Location: login.php");
        //         return;
        //     }
        // }
        
        

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    <h1>Please Log in</h1>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Enter your email">

    <label for="pass">Password:</label>
 <input type="password" id="password" name="password" placeholder="Enter your password">      
 <input type="submit" name="submit" id="sub" onclick="return val();" value="Log In">
        <button type ="reset" name = "cancel">Cancel</button>
        <script src="login.js"></script>
        <h4>For a password hint, view source and find an account and password hint in the html comments</h4>
    </form>
</body>
</html>