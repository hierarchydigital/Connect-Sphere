<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="LOGO\LOGO.png" type="image/png">
    <title>Login - Connect Sphere</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            width: 75%;
            max-width: 600px;
            text-align: center; /* Center text inside the container */
            margin-top: 10%;
        }
        .logo {
            max-width: 100%;
            height: auto; /* Ensure the logo scales properly */
            margin-bottom: 20px; /* Space between logo and form */
        }
        h1 {
            font-size: 30px;
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
            text-align: left; /* Align labels to the left */
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #333;
            border-radius: 20px;
            background-color: #222;
            color: #fff;
            box-sizing: border-box; /* Include padding in the total width */
        }
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #007bff;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #ff4d4d;
            text-align: center;
            margin-bottom: 15px;
        }

        .logo1 {
            margin-top: 30px;
        }

        .h2 {
            margin-left: 2px;
            margin-right: 2px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="logo1" align = "center">
<img src="LOGO\WHITE.png" alt="App Logo" class="logo" width = "50px" align = "center"> <!-- Adjust path as needed -->
<h2 class = "h2"> Don’t miss out on the latest trends and opportunities!</h2>
<div>
<div class="container">

    <h1>Sign in</h1>

    <?php if ($is_invalid): ?>
        <div class="error-message">Invalid email or password</div>
    <?php endif; ?>

    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" 
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Log in</button>
    </form>
    <h5>Don't have an Account? <a href="signup.html">Sign up here</a>.</h5>
</div>

<h6>By signing in, you agree to our <a href="coc.html">Code of Conduct </a> and  <a href="tos.html">Terms of Service</a>.</h6>


</body>
</html>
