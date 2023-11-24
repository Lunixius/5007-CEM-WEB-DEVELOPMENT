<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
<title>forum</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
        
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

<!-- Menu -->
    <div class="menu">
        <a href="index.php">Home</a>
        <a id="profile" href="user_page.php">User Profile</a>
        <a id="login-signup" href="login_form.php">Log In</a>
    </div>

<!-- Modal -->
<div id="ReplyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reply Question</h4>
      </div>
      <div class="modal-body">
        <form name="frm1" method="post">
            <input type="hidden" id="commentid" name="Rcommentid">
        	<div class="form-group">
        	  <label for="usr">Write your name:</label>
        	  <input type="text" class="form-control" name="Rname" required>
        	</div>
            <div class="form-group">
              <label for="comment">Write your reply:</label>
              <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
            </div>
        	 <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
      </form>
      </div>
    </div>

  </div>
</div>

<div class="container">

<div class="panel panel-default" style="margin-top:50px">
  <div class="panel-body">
    <h3>Community forum</h3>
    <hr>
    <form name="frm" method="post">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
	<div class="form-group">
	  <label for="usr">Write your name:</label>
	  <input type="text" class="form-control" name="name" required>
	</div>
    <div class="form-group">
      <label for="comment">Write your question:</label>
      <textarea class="form-control" rows="5" name="msg" required></textarea>
    </div>
	 <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
  </form>
  </div>
</div>
  

<div class="panel panel-default">
  <div class="panel-body">
    <h4>Recent questions</h4>           
	<table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
	  <tbody id="record">
		
	  </tbody>
	</table>
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