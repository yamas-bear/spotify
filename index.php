<?php
//コマンドについては以下参照
//https://github.com/jwilsson/spotify-web-api-php/blob/master/docs/method-reference/SpotifyWebAPI.md#getmytop
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '6b2c042413774c9f910b37ab24f48f0d',
    '133b7425799048c2badf1809532e95b6',
    'http://localhost:8888/callback'

);

$api = new SpotifyWebAPI\SpotifyWebAPI();
$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();
$api->setAccessToken($accessToken);

//niziu
//https://open.spotify.com/artist/3z8diLlUCkN1j9N9ZdnfBJ?si=B_NYvwyZRR-ErGuOSC83Tg
//step and step
//https://open.spotify.com/track/5DgAgJbHcm74RyA9YKj6k1?si=FFmuzottS1OoqqpFF-PGKw

// $artists = $api->getArtistAlbumss('3z8diLlUCkN1j9N9ZdnfBJ?si=B_NYvwyZRR-ErGuOSC83Tg');
$related_artists = $api->getArtistRelatedArtists('3z8diLlUCkN1j9N9ZdnfBJ?si=B_NYvwyZRR-ErGuOSC83Tg');
$analysis = $api->getAudioAnalysis('5DgAgJbHcm74RyA9YKj6k1?si=FFmuzottS1OoqqpFF-PGKw');
// print_r($analysis->track);
print_r($related_artists);
// // foreach ($artists->artists as $artist) {
// //     echo '<b>' . $artist->name . '</b> <br>';
// // }
// echo $artists.string;

?>

