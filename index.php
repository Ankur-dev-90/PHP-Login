<?php
session_start();
include("config.php");
if (isset($_POST['username']) && isset($_POST['password'])) {
// Get user input from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the user exists
$query = "SELECT * FROM user WHERE name='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Login successful
    $_SESSION['username'] = $username;
    header("Location: dashboard.php"); // Redirect to a dashboard or protected page
} else {
    // Login failed
    $error_message = "Login failed. Please check your username and password.";
}
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST" action="index.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</div>
    <?php
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>
</body>
</html>
