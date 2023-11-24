<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

<style>
body {
    font-family: Arial, sans-serif;
    /* Set the background image and define its properties */
    background-image: url('sunset.jpg'); /* Correct the path */
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the container */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh; /* Set a minimum height of the viewport's height */
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

/* Add some top margin to the first container to push it below the menu bar */
.container#banner {
    margin-top: 80px; /* Adjust this value based on your design preferences */
}

/* Style for the choice bar */
.choice-bar {
    background-color: rgba(0, 0, 0, 0.5); /* Add a semi-transparent background to the choice bar */
    color: white; /* Text color */
    text-align: center; /* Center-align text */
    padding: 10px; /* Add padding to the choice bar */
}

/* Style for the choice bar links */
.choice-bar a {
    color: white; /* Text color */
    text-decoration: none; /* Remove underline from links */
}

/* Style for the choice bar links on hover */
.choice-bar a:hover {
    text-decoration: underline; /* Underline links on hover */
}

/* Style for the login/logout button */
.login-logout-button {
    float: right; /* Align the button to the right */
    padding: 14px 16px; /* Add spacing around the button */
    background-color: #007bff; /* Blue background color for the button */
    color: white; /* Text color */
    border: none; /* Remove button border */
    cursor: pointer; /* Add a pointer cursor on hover */
}

.container{
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
      <h3>hi, <span>admin</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Admin page</p>
      <a href="index.php" class="btn">Home</a>

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