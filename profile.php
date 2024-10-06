<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$user = $_SESSION['user']; // Get user information from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <img src="<?php echo htmlspecialchars($user['picture']); ?>" alt="Profile Picture" width="100">
    
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
