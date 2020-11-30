<?php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'e6778487ca914c3991f78eb0432e3709',
    'c598651f076e415a8dd8db5662f4a30c',
    'http://localhost/spotify/'
);

$options = [
    'scope' => [
        'playlist-read-private',
        'user-read-private',
    ],
];

header('Location: ' . $session->getAuthorizeUrl($options));
die();
?>