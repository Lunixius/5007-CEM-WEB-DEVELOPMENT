<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <style>
        /* Your CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        #background-image {
    position: fixed; /* Fixed positioning so it covers the entire viewport */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Place it behind other content */
    opacity: 0.6; /* Adjust the opacity as needed */
}

/* Style for the menu container */
.menu {
    background-color: #333; /* Background color of the menu */
    overflow: hidden;
    position: fixed; /* Fix the menu bar in place */
    top: 0; /* Position it at the top of the viewport */
    width: 100%; /* Make it stretch to the full width of the viewport */
    z-index: 100; /* Ensure it's above other content */
    display: flex; /* Use flex layout */
    justify-content: center; /* Center-align menu items horizontally */
    align-items: center; /* Center-align menu items vertically */
}

/* Style for the menu items */
.menu a {
    color: white; /* Text color */
    text-align: center; /* Center-align text */
    padding: 14px 24px; /* Add more spacing around menu items */
    text-decoration: none; /* Remove underline from links */
    margin: 0 10px; /* Add horizontal spacing between menu items */
}

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: crimson;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:crimson;
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: crimson;
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: crimson;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:crimson;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}

/* Style for the footer */
.footer {
    font-family: 'Roboto', sans-serif;
    padding: 20px;
    background-color: #333; /* Dark background color for the footer */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    position: fixed; /* Fixed position to stick it to the bottom */
    bottom: 0; /* Stick it at the bottom of the viewport */
}


#footer #social a {
    margin: 0 10px;
    text-decoration: none; /* Remove underline from social icons */
    color: white; /* Set the color of social icons to white */
}

#footer ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

#footer ul li {
    margin: 0 10px;
}

#footer ul li a {
    text-decoration: none; /* Remove underline from footer links */
    color: white; /* Set the color of footer links to white */
    transition: color 0.3s; /* Add a smooth color transition */
}

#footer ul li a:hover {
    color: #007bff; /* Change link color on hover */
}

.footer p {
    color: white; /* Set the text color to white */
}
    </style>

</head>
<body>
    
        <!-- Menu -->
    <div class="menu">
        <a href="index.php">Home</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>
   
<div class="container">

   <div class="content">
      <h3>Hi, <span>user</span> !</h3>
      <h1>Welcome, <span><?php echo $_SESSION['user_name'] ?></span>.</h1>
      <p>User page</p>
      <a href="index.php" class="btn">Main page</a>
   </div>

</div>
        
        </div>
    
    <!-- Footer -->
    <div class="footer" id="footer">
        <ul>
            <li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="terms.html">Terms of Service</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
        <div id="social">
            <a href="#"><img src="facebook.png" alt="Facebook"></a>
            <a href="#"><img src="twitter.png" alt="Twitter"></a>
            <a href="#"><img src="instagram.png" alt="Instagram"></a>
        </div>
        <p>&copy; 2023 Community Forum</p>
    </div>

</body>
</html>