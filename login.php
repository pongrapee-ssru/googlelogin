<?php
session_start();
require_once 'config.php'; // Include the config file

// Check if user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: profile.php'); // Redirect to profile page if logged in
    exit();
}

// URL to request Google OAuth2.0
$auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'response_type' => 'code',
    'scope' => 'openid profile email',
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google OAuth2.0 Login</title>
</head>
<body>
    <h2>Login with Google</h2>
    <a href="<?php echo $auth_url; ?>">Login with Google</a>
</body>
</html>
