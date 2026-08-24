<?php
declare(strict_types=1);

namespace protfolio;

//require_once "protfolio.php";

class Signin
{   
    public static array $error = [
        'name-error'     => '',
        'email-error'    => '',
        'password-error' => ''
    ];

    public static function signup(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $username = trim($_POST['username']) ?? '';
            $email = trim($_POST['email']) ?? '';
            $password = trim($_POST['password']) ?? '';

            if (empty($username)) 
            {
                self::$error['name-error'] = 'Username is required';
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                self::$error['email-error'] = 'Email is required';
            }
            if (empty($password))
            {
                self::$error['password-error'] = 'Password is required';
            } 
            if (!array_filter(self::$error)) 
            {
                echo "<br>Thank you for entering your credentials. Your username is " . htmlspecialchars($username);
            }
        }
    }
}

// Execute the class logic right before rendering the HTML
Signin::signup();
?>

<?php
// 1. Load the backend file that contains the Signin class
//require_once "index.php";

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
    <form action="index.php" method="post"><br>
        
        <label>username: </label>
        <!-- 4. Added namespace backslash prefix so PHP can find the class -->
        <input type="text" name="username" placeholder="Noob">
        <span class="error">* <?php echo htmlspecialchars(Signin::$error['name-error']); ?></span><br>
        
        <label>email: </label>
        <input type="email" name="email" placeholder="noob@gmail.com">
        <span class="error">* <?php echo htmlspecialchars(Signin::$error['email-error']); ?></span><br>

        <label>password: </label>
        <input type="password" name="password" placeholder="password">
        <span class="error">* <?php echo htmlspecialchars(Signin::$error['password-error']); ?></span><br>
        
        <label>signin:</label>
        <input type="submit" value="signin">
    </form>
</body>
</html>
