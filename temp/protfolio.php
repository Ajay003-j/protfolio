<?php
// 1. Load the backend file that contains the Signin class
require_once "index.php";

// 2. Run the logic method to process the form inputs and generate errors
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <!-- 3. Form action sends data back to THIS file so the PHP at the top triggers -->
    <form action="portfolio.php" method="post"><br>
        
        <label>username: </label>
        <!-- 4. Added namespace backslash prefix so PHP can find the class -->
        <input type="text" name="username" placeholder="Noob">
        <span class="error">* <?php echo htmlspecialchars(Signin::$namerr); ?></span><br>
        
        <label>password:</label>
        <input type="password" name="password" placeholder="password">
        <span class="error">* <?php echo htmlspecialchars(Signin::$passerr); ?></span><br>
        
        <label>signin:</label>
        <input type="submit" value="signin">
    </form>
</body>
</html>
