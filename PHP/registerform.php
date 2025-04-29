<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:rgb(127, 172, 217);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            background-color: lightcyan;
            padding: 40px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .error {
            color: #ff3860;
            font-size: 0.9em;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 500;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .gender-options {
            margin-top: 10px;
        }

        .submit-btn {
            margin-top: 30px;
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .your-input {
            margin-top: 40px;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php
// Define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
    <h2>Register Here</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Name:
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
        </label>

        <label>E-mail:
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error">* <?php echo $emailErr; ?></span>
        </label>

        <label>Website:
            <input type="text" name="website" value="<?php echo $website; ?>">
            <span class="error"><?php echo $websiteErr; ?></span>
        </label>

        <label>Comment:
            <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        </label>

        <label>Gender:</label>
        <div class="gender-options">
            <label><input type="radio" name="gender" <?php if ($gender == "female") echo "checked"; ?> value="female"> Female</label>
            <label><input type="radio" name="gender" <?php if ($gender == "male") echo "checked"; ?> value="male"> Male</label>
            <label><input type="radio" name="gender" <?php if ($gender == "other") echo "checked"; ?> value="other"> Other</label>
            <span class="error">* <?php echo $genderErr; ?></span>
        </div>

        <input type="submit" name="submit" value="Submit" class="submit-btn">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$genderErr && !$websiteErr): ?>
        <div class="your-input">
            <h3>Your Input:</h3>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Website:</strong> <?php echo $website; ?></p>
            <p><strong>Comment:</strong> <?php echo $comment; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
