<?php
//コマンドについては以下参照
//https://github.com/jwilsson/spotify-web-api-php/blob/master/docs/method-reference/SpotifyWebAPI.md#getmytop
//niziu
//https://open.spotify.com/artist/3z8diLlUCkN1j9N9ZdnfBJ?si=B_NYvwyZRR-ErGuOSC83Tg
//step and step
//https://open.spotify.com/track/5DgAgJbHcm74RyA9YKj6k1?si=FFmuzottS1OoqqpFF-PGKw
// ['artists']['items'][0]['uri']

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

$artist_name = "mol-74";
$target_artist = $api->search('artist:'.$artist_name.'','artist');
$target_artist = get_object_vars($target_artist);//オブジェクトを配列に変換
// $related_artists = $api->getArtistRelatedArtists('3z8diLlUCkN1j9N9ZdnfBJ');//関連するアーティスト(直接uriで検索)
$related_artists = $api->getArtistRelatedArtists($target_artist['artists']->items[0]->uri);//関連するアーティスト(アーティストの名前で検索をかけ、その結果取得したuriで検索)

print_r($target_artist['artists']->items[0]->name."\n");
foreach($related_artists->artists as $related_artist){
    print_r($related_artist->name."\n");
}
?>

