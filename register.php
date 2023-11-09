<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if($conn==false){
    dir('Error:Cannot connect');
}

if(isset($_POST["submit"])){
    if (empty($username) || empty($email) || empty($password)){
        $error= 'all fields are required' ;
    }
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Validate the form inputs
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address';
    } else {
        // Store the user data in a database or a file
        $sql="INSERT INTO `users`(`username`, `email`, `password`) VALUES('$username', '$email', '$password');";
        $result=mysqli_query($conn,$sql);

       if($result){
        // Redirect the user to the dashboard
        echo "Table created successfully";
        $_SESSION['logged_in'] = true;
        header('Location: welcome.php');
       }
       else{
        echo "Username already taken";
       }
        exit;
    }
}
}
?>

<html>
    <head>
        <style>
        h3{
    font-size:2.5vw;
    text-align: center;
}
.sign-in{
    padding-top:5px;
    padding-bottom:5px;
    background-color:rgb(255,255,255, 0.5);
    border-radius:10px;
    height: 80%;
    width:30%;
    margin:4% 0 0 35%;
}
.submit{
    font-size:1.5vw;
    margin:4% 0 0 30%;
    padding:5 15 5 15;
}
.log-in{
    color:black;
    text-decoration:none;
    border-radius:5px;
    margin-left:30%;
    padding:2%;
    font-size:larger;
    
}

a:hover{
    background-color:rgb(255,255,255,0.5);
    transition:0.5s;
}
input{
    font-size:1.5vw;
    margin-top:-5%;
    border-radius:10px;
    padding-right:20%;
    padding-bottom:2%;
}
p{
    font-size:2vw;
}
p,input{
    margin-left:5%;
}
.faheem{
    font-size:1.5vw;
    margin-left:10%;
    margin-top:5%; 
}
        </style>
        <body style="background-image:url('sign-in.png');width:100%">
            
        <h3>SIGN-IN PAGE</h3>
            <hr>
            <form action="" method="post">
                <div class="sign-in">
                <p>Username:</p>
                <input type="text" name="username" id="inputUsername" placeholder="Username">


                <p>E-Mail:</p>
                <input type="email" name="email" id="inputPassword" placeholder="Enter E-Mail">


                <p>Password:</p>
                <input type="Password"name="password" id="confirmPassword" placeholder="Enter Password">
                <p>Confirm-Password:</p>
                <input type="Password"name="password" id="confirmPassword" placeholder="Enter Password">
                <button class="submit" name="submit" type="submit">Sign in</button>
                <h5 class="faheem">Already have an account?  
                <a class="log-in" href="login.php" style="font-size:1.5vw;">log in</a> </h5>  
                </div>
            </form>
            
        </body>
    </head>
</html>