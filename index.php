<?php
require_once 'vendor/autoload.php';

// Set up Google Client
$client = new Google_Client();
$client->setClientId('YOUR_GOOGLE_CLIENT_ID');  // Replace with your Google Client ID
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');  // Replace with your Google Client Secret
$client->setRedirectUri('http://localhost/callback.php');  // Replace with your redirect URI
$client->addScope('email');

// Generate OAuth URL and redirect user
$authUrl = $client->createAuthUrl();
header('Location: ' . $authUrl);
exit();
?>
