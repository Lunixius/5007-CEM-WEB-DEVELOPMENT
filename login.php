<?php
// Include your database connection file
include_once 'conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If the request content type is JSON, decode it
    if ($_SERVER["CONTENT_TYPE"] == "application/json") {
        $data = json_decode(file_get_contents("php://input"), true);

        // Process $data and check login
        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;

        // ... (same logic as before, check against your 'user' table)

        // Return a JSON response
        header('Content-Type: application/json');
        if ($loginSuccessful) {
            http_response_code(200); // OK
            echo json_encode(["message" => "Login successful"]);
        } else {
            http_response_code(401); // Unauthorized
            echo json_encode(["message" => "Invalid username or password"]);
        }

        // Terminate script execution after sending the response
        exit();
    } else {
        // Get the user input
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        // Your database connection
        $database = new Database();
        $conn = $database->getConnection();

        // Check if the user exists in the database
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$username, $password]);

        // Check if the login is successful
        if ($stmt->rowCount() > 0) {
            // Start the session and redirect to index.php
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            http_response_code(401); // Unauthorized
            $error_message = "Invalid username or password";
        }

        // Close the database connection
        $stmt->closeCursor();
        $conn = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">   

    <link rel="stylesheet" type="text/css" href="login-styles.css">

    <link rel="icon" href="assets/mountain.jpg" type="image/jpg">
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url(mountain.jpeg);
        background-repeat: no-repeat;
        background-size: cover;
        background-color: rgba(255, 255, 255, 0.8);
        height: 100vh; /* Set the body to full viewport height */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    background-image {
        position: fixed; /* Fixed positioning so it covers the entire viewport */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1; /* Place it behind other content */
        opacity: 0.6; /* Adjust the opacity as needed */
    }

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

    .menu a {
        color: white; /* Text color */
        text-align: center; /* Center-align text */
        padding: 14px 24px; /* Add more spacing around menu items */
        text-decoration: none; /* Remove underline from links */
        margin: 0 10px; /* Add horizontal spacing between menu items */
    }

    .container {
        max-width: 400px;
        padding: 40px; /* Increase padding for more height */
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        text-align: center;
        margin: auto; /* Center the container */
        margin-top: 50px; /* Adjust this value based on your design preferences */
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 70vh; /* Adjust this value based on your design preferences */
    }
    .container h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        text-align: left; /* Align labels to the left */
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        box-sizing: border-box; /* Include padding and border in element's total width and height */
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

/* Style for footer */
.footer {
    font-family: 'Roboto', sans-serif;
    padding: 20px;
    position: fixed; /* Fix the menu bar in place */
    bottom: 0; /* Position it at the top of the viewport */
    background-color: #333; /* Dark background color for the footer */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
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
    </style>
</head>
<body>
    
    <div class="menu">
        <a href="index.php">Home</a>
    </div>

    <div class="container">
        <h2>Login</h2>
        
        <?php
        // Display error message if login failed
        if (isset($error_message)) {
            echo "<p style='color: red;'>$error_message</p>";
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register here</a></p>
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
