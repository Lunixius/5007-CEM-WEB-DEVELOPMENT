
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="path/to/your/css/style.css">
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
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <a href="login.html">Already registered? Login here!</a>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>

</html>

