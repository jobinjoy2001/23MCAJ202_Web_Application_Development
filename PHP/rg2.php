<?php
// Initialize variables
$name = $email = $password = $confirm_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Name is required.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }
    
    // Validate Password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Password is required.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must be at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Confirm Password
    if (empty(trim($_POST["confirmPassword"]))) {
        $confirm_password_err = "Please confirm your password.";
    } elseif ($_POST["password"] !== $_POST["confirmPassword"]) {
        $confirm_password_err = "Passwords do not match.";
    } else {
        $confirm_password = trim($_POST["confirmPassword"]);
    }
    
    // Check for errors before processing
    if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        echo "<p style='color: green;'>Registration successful!</p>";
        // Here, you would typically insert data into a database
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body {
            background-color: aqua;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: antiquewhite;
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 2px solid #0c0c0c;
            border-radius: 5px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            padding: 5px;
            font-size: 14px;
            border: 1px solid #040303;
            border-radius: 3px;
            width: 100%;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 2px;
        }
        button {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            font-weight: bold;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #34abaf;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Register</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                <span class="error"><?php echo $name_err; ?></span>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $email_err; ?></span>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="error"><?php echo $password_err; ?></span>
            </div>
            
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
                <span class="error"><?php echo $confirm_password_err; ?></span>
            </div>
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
