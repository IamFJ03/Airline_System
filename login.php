<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if($conn==false){
    dir('Error:Cannot connect');
}
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username)){
        header("Location: index.php?error=Username is required");
        exit();
    }
    else if(empty($password)){
        header("Location: login.php?error=Password is required");
        exit();
    }
    else{
    $sql="SELECT * FROM `users` WHERE username='$username' and password='$password';";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)){
        $_SESSION['logged_in'] = true;
        header('Location: welcome.php');
        exit;
    } else {
        $alert="<script>alert('Incorrect Username or password');</script>";
        echo $alert;
    }
}
}
?>

<html>
    <head>
        <style>
        body{
            margin:0;
            padding: 0;
            background-color:rgb(209, 197, 197);
             
        }
        .login{
            border-radius:20px;
            padding:1% 2% 12% 2%;
            margin-left: 30%;
            margin-top: 7%;
            height:70%;
            width:30%;
            background-color:white;
            border-radius: 3px;
            text-align: justify;
        }
        p,input{
           margin-top: 10%;
          margin-left: 10%;
        }
        p{
            font-size: 2vw;
        }
        input{
            font-size:1.5vw;
            margin-top: -3%;
            background-color: rgb(255, 255, 255, 0.5);
            padding-right: 10%;
            padding-bottom: 2%;
            border-radius: 3px;
            border:1px solid black;
        }
        button{
           
           margin:-5% 0 0 0;
           font-size: large;
           
           padding-left: 30px;
           padding-right: 30px;
        }
        button:hover{
            background-color:rgb(7, 7, 7);
            color:white;
            transition:0.5s;
        }
        h2{
            margin-left:7%;
        }
        a{
            margin-left:4%;
        }
        .head{
         height:25%;
         width:100%;
         background-color: black;
         color:white;
         border-radius:10px;
         padding:1% 6% 1% 7%;
         font-size:2vw;
         margin:-5% 0 0 -6.5%;
        }
        </style>
    </head>
    <body>
    <?php if (isset($error)): ?>
        <p style="color: red;">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>
        <form action="" method="post">
             <div class="login">
                 <div class="head">
             <h2>Welcome Back</h2>
            </div>
             <p>Username:</p>
             <input type="text" name="username" class="ue" placeholder="Username">

             <p>Password:</p>
             <input type="password" name="password" class="up" placeholder="Password">
            
             <p>Confirm-Password:</p>
             <input type="password" class="ucp" placeholder="Confirm-Password">
             <p><button style="font-size:2vw;padding:1% 4% 1% 4%">log in</button></p>
             <h4 style="font-size:1.5vw;margin-left:10%">Don't Have an Account?
                 <a href="register.php">sign in</a>
             </h4>
             </div>
             
            </form>
    </body>
</html>