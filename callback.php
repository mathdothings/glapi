<?php
require_once 'vendor/autoload.php';

// Set up Google Client
$client = new Google\Client();
$client->setClientId('YOUR_GOOGLE_CLIENT_ID');  // Replace with your Google Client ID
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');  // Replace with your Google Client Secret
$client->setRedirectUri('http://localhost/callback.php');  // Replace with your redirect URI

// Get the authorization code from URL parameters
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Authenticate with Google and get the access token
    $token = $client->fetchAccessTokenWithAuthCode($code);

    // Set the access token to the client
    $client->setAccessToken($token['access_token']);

    // Get the Google OAuth 2.0 service
    $oauthService = new Google\Service\Oauth2($client);

    // Fetch the user profile
    $userInfo = $oauthService->userinfo->get();

    // Output user info (or handle the data as needed)
    echo "<script src='https://accounts.google.com/gsi/client' async></script>";
    echo 'User Info: <br>';
    echo 'ID: ' . $userInfo->id . '<br>';
    echo 'Name: ' . $userInfo->name . '<br>';
    echo 'Email: ' . $userInfo->email . '<br>';
    echo 'Picture: <img src="' . $userInfo->picture . '" alt="Profile Picture"><br>';

} else {
    echo 'Authorization failed.';
}
?>
