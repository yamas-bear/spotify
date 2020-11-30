<?php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'e6778487ca914c3991f78eb0432e3709',
    'c598651f076e415a8dd8db5662f4a30c',
    'http://localhost/spotify/'
);

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();

// Store the access and refresh tokens somewhere. In a database for example.

// Send the user along and fetch some data!
header('Location: app.php');
die();
?>