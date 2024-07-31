<h4 style="color:#fff;">
<?php 
session_start();
include('dbconn.php');?>
<?php 
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username=stripcslashes($username);
    $password=stripcslashes($password);
    $username=mysqli_real_escape_string($conn, $username);
    $password=mysqli_real_escape_string($conn, $password);
    $query=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password= '$password'");
    
    if(mysqli_num_rows($query)< 1){
        echo "Username or password mismatch!";
    }else{
        echo "Login success";
        $_SESSION['username']=$username;
        header("Location: index.php");
    }

}

?>

</h4>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            background: rgb(168, 116, 231);
            font-family: sans-serif ;
        }
        .login{
            text-align: center;
            padding-top:60px;

        }
        .login form div{
            background:white;
            margin: 5% 20%;
            padding: 30px 60px;
            text-align: left;
            border-radius: 10px;
            align-items: center;

        }
        @media (max-width:600px) {
            .login form div{
                margin:0%;
            }   
        }
        .login form div h1{
            font-size: 35px;
            text-align: center;
            color: black;
        }
        .login form div label{
            font-size:25px;
            padding-bottom:20px;
            font-weight: bold;
            

        }
        .login form div input{
            width: 100%;
            height:40px;
            font-size:20px; 
            padding-left:10px;
            margin-top: 5px;
            margin-bottom: 5px
        }
        .login form div .submit{
            width: 30%;
            color: white;
            background: rgb(64, 1, 100);
            margin:auto;
            border-radius: 50px;
            margin-top:20px;

        }
        .login form div button a{
            color: white; 
            text-decoration: none;
            font-size: 25px;


        }

    </style>
</head>

<body>
   <div class="login">
       <form action="login.php" method="post">
        <div>
            <h1>login account</h1>
            <label for="">Username:-</label> <br>
            <input type="text" name="username" id="username"  placeholder="enter your user /email" required><br>
            <label for="">Password:-</label><br>
            <input type="password" name="password" id="password" placeholder="enter your password"><br>
            <input class= "submit" type="submit" name="submit" value="Login">

        </div>
       </form>

   </div>
    
</body>
</html>