<?php
//Use need to create a database first named login and inside that table

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if($conn==false){
    dir('Error:Cannot connect');
}
else{
       if(isset($_POST['show'])){
        if(empty($_POST['from'])){
            $alert="<script>alert('Departure place is required');</script>";
            echo $alert;
        }
        else if(empty($_POST['destination'])){
            $alert="<script>alert('Destination place is required');</script>";
            echo $alert;
        }
        else if(empty($_POST['travellers'])){
            $alert="<script>alert('Number of traveller is required');</script>";
            echo $alert;
        }
        else{
           $from=$_POST['from'];
           $destination=$_POST['destination'];
           if($from=="Kolkata" && $destination=="Hyderabad" || $from=="Hyderabad" && $destination=="Kolkata"){
           header("location:K_TO_H.html");
           }
           else if($from=="Delhi" && $destination=="Mumbai" || $from=="Mumbai" && $destination=="Delhi"){
            header("location:d-to-m.html");
           }
            else if($from=="Gujrat" && $destination=="Pune" || $from=="Pune" && $destination=="Gujrat"){
                header("location:g-to-p.html");
           }
           else if($from=="Bhopal" && $destination=="Chennai" || $from=="Chennai" && $destination=="Bhopal"){
            header("location:b-to-c.html");
           }
          
           else if($from=="Lukhnow" && $destination=="Bhubaneshwar" || $from=="Bhubaneshwar" && $destination=="Lukhnow"){
             header("location:b-to-l.html");
           }
           else if($from=="Rajasthan" && $destination=="Dehradun" || $from=="Dehradun" && $destination=="Rajasthan"){
           header("location:r-to-d.html");
           }

}
}
}

?>
<html>
    <style>
        body{
            margin:0;
            padding:0;
            font-family: sans-serif;
        }
        .frame{
        background-image:url('view.jpg');
        width:100%;
        height:80%;
        color:white;
        }
        .head{
            color:white;
            background-image:linear-gradient(to right,purple,black);
            width:100%;
            height:14%;
        }
        .more{
            font-size:1.5vw;
            border-radius: 10px;
            padding: 1% 2% 1% 2%;
            color:white;
            background-image:linear-gradient(to right,red,black);
            cursor:pointer;
            margin:7% 0 0 5%;
            
        }
        .place,.city{
            transform: translate(5%,200%) scale(1);
        }
        
        .info{
            background-color: rgb(17, 17, 17);
            width:90%;
            height: 25%;
            padding-bottom:2%;
            padding-right:3%;
            margin: -9% 0 0 5%;
            border-radius: 5px;
            box-shadow: 6px 6px 6px;
        }
        a{
            text-decoration: none;
            color:white;
            padding:0 6% 0 5%;
        }
        .link{
            font-size:1.5vw;
            display:inline-flex;
            margin:-4% 0 0 60%;
        }
        a:hover{
            
            border-bottom: 2px solid black;
        }
        input{
            font-size:1.5vw;
            display: block;
            padding:1% 0% 1% 0;
            border-radius:10px;
            background-color: rgba(83, 82, 82, 0.3);
            border-color: purple;
            color: rgb(95, 97, 99);
        }
        .from{
            color: aliceblue;
            transform:translate(1%,74%) scale(1);
        }
        .destination{
            color: aliceblue;
            margin:-3% 0 0 25%;
        }
        .in{
            color: aliceblue;
            transform:translate(48%,-250%) scale(1);
        }
        
        .show{
            color:white;
            font-size:1.5vw;
            border-radius: 10%;
            margin:-22% 0 0 90%;
            padding:1% 2% 1% 2%;
            background-image:linear-gradient(to right,purple,black);
            cursor:pointer;
        }
        .popular{
            margin-left: 450px;
        }
        .travellers{
            color:white;
          transform:translate(65%,-125%) scale(1);
        }
        button:hover{
            cursor:pointer;
        }
        .name{
            margin: 2%;
        }
    </style>
    <body>
        <div class="head">
            <h2 class="name" style="font-size:2.5vw;padding-top:1.5%">Jet Ways</h2>
            <h4 class="link">
                <a href="welcome.html">Home</a>
                <a href="service.html">Service</a>
                <a href="contact.html">Contact</a>
                <a href="about.html">About</a>
            </h4>
         </div>
        <div class="frame">
         <h2 class="place" style="font-size:2.5vw">Beautiful Place</h2>
         <h1 class="city" style="font-size:3vw">Hyderabad City</h1>
         <button class="more">More Information</button>
         
        </div><form method="post">
        <div class="info">
            <h3 class="from" style="font-size:1.5vw">Travelleing From:
                <input type="text" name="from" placeholder="From:">
            </h3>
            
            
            <h3 class="Destination" style="font-size:1.5vw">Destination:
                <input type="text" name="destination" placeholder="to:">
            </h3>
            <h3 class="travellers" style="font-size:1.5vw">Travellers:
                <input type="number" name="travellers" placeholder="to:">
            </h3>
            <h3 class="in" style="font-size:1.5vw">Check In:
                <input type="date">
            </h3>
            
            <button class="show" name="show">Flights</button>
        </div>
        </form>
        
    </body>
</html>