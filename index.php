<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TypingWarzz-Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link rel="stylesheet" href="lib/bootstrap-4.3.1/css/bootstrap.min.css"  rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="lib/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap-4.3.1/js/bootstrap.min.js"></script>
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
    body {
        font-family: 'Karla', sans-serif !important;
    }

    </style>
    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "typingwarzz";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 
        if($_SERVER['REQUEST_METHOD']=='POST'){  
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query1 = "SELECT * FROM profile WHERE user_id='$username'";
            $result1 = mysqli_query($conn, $query1);
            if(mysqli_num_rows($result1) > 0)
            {
                $query2 = "SELECT * FROM profile WHERE user_id='$username' AND password='$password';";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2) > 0)
                {
                    $row = mysqli_fetch_assoc($result2);
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['ID'] = $row['ID'][0];
                    $url = "homepage.php";
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
    <div class="login-form" style="margin-top: 10%;">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="display:inline-block;text-center:true;"><img src="images/logo.png" width=45 length=45 style="float:left;margin-right: 7%;margin-left: 4%;margin-bottom: 10%;"><h2 >TypingWarzz</h2></div>       
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