<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TypingWarzz-Login</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
    .login-form {
        width: 340px;
        margin: 50px auto;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
       min-height: 38px;
       border-radius: 2px;
    }
    .btn {        
       font-size: 15px;
       font-weight: bold;
    }
    </style>
    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "type_racer";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 
        if($_SERVER['REQUEST_METHOD']=='POST'){  
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query1 = "SELECT * FROM login WHERE user_name='$username'";
            $result1 = mysqli_query($conn, $query1);
            if(mysqli_num_rows($result1) > 0)
            {
                $query2 = "SELECT ID FROM login WHERE user_name='$username' AND password='$password';";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2) > 0)
                {
                    $row = mysqli_fetch_assoc($result2);
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['ID'] = $row['ID'][0];
                    $url = "/typeracer/homepage.php";
                    header('Location: '.$url);
                    exit();
                }
                else
                {
                    echo "Invalid Password!!";
                }
            }
            else 
            {
                echo "Username not present !!";
            }
        }
    ?>
</head>
<body>
    <div class="login-form">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h2 class="text-center">Log in</h2>       
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            </div>        
        </form>
        <p class="text-center"><a href="register.php">Create an Account</a></p>
    </div>
</body>
</html>