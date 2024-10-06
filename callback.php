<?php
session_start();
require_once 'config.php'; // Include the config file

// Exchange authorization code for an access token
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Request access token from Google
    $token_url = 'https://oauth2.googleapis.com/token';
    
    $post_fields = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code',
    ];

    // Initialize cURL session
    $ch = curl_init($token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response
    $token_data = json_decode($response, true);

    // Extract the access token
    $access_token = $token_data['access_token'];

    // Fetch user's Google profile using the access token
    $profile_url = 'https://www.googleapis.com/oauth2/v3/userinfo?access_token=' . $access_token;
    
    $ch = curl_init($profile_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $profile_response = curl_exec($ch);
    curl_close($ch);

    // Decode the profile response
    $user_info = json_decode($profile_response, true);

    // Store user info in the session
    $_SESSION['user'] = $user_info;

    // Redirect to the profile page
    header('Location: profile.php');
    exit();
} else {
    echo "Error: Authorization code not found.";
}
?>
