<?php
//コマンドについては以下参照
//https://github.com/jwilsson/spotify-web-api-php/blob/master/docs/method-reference/SpotifyWebAPI.md#getmytop
//niziu
//https://open.spotify.com/artist/3z8diLlUCkN1j9N9ZdnfBJ?si=B_NYvwyZRR-ErGuOSC83Tg
//step and step
//https://open.spotify.com/track/5DgAgJbHcm74RyA9YKj6k1?si=FFmuzottS1OoqqpFF-PGKw
// ['artists']['items'][0]['uri']
/*GET https://accounts.spotify.com/authorize?client_id=6778487ca914c3991f78eb0432e3709&response_type=code&redirect_uri=http://localhost:8888/callback&scope=user-read-private%playlist-modify-public%20user-read-email&state=34fFs29kd09*/
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'e6778487ca914c3991f78eb0432e3709',
    'c598651f076e415a8dd8db5662f4a30c',
    'http://localhost:8888/callback'
);

$options = [
    'scope' => [
        'playlist-read-private',
        'playlist-modify-public',
        'user-read-private',
    ],
];


$api = new SpotifyWebAPI\SpotifyWebAPI();
$session->requestCredentialsToken();
// // $session->requestAccessToken();
$accessToken = $session->getAccessToken(); 
// $user_id = 'ewghih29bpxs44q2mezn5rmg3'; 
// print_r($api->getMyTop('tracks', ['limit' => 4]));
// $session->requestAccessToken($_GET['code']);

// $accessToken = $session->getAccessToken();
// $refreshToken = $session->getRefreshToken();
$api->setAccessToken($accessToken);





print_r('What aritist do you like ?'."\n");
$artist_name = trim(fgets(STDIN));

// print_r('Can you tell me the name of the playlist?'."\n");
// $play_list_name = trim(fgets(STDIN));
// $tracks = [];
$track_number = 1;
// $options[] = $play_list_name;
$target_artist = $api->search('artist:'.$artist_name.'','artist');
$target_artist = get_object_vars($target_artist);//オブジェクトを配列に変換
// $related_artists = $api->getArtistRelatedArtists('3z8diLlUCkN1j9N9ZdnfBJ');//関連するアーティスト(直接uriで検索)
$related_artists = $api->getArtistRelatedArtists($target_artist['artists']->items[0]->uri);//関連するアーティスト(アーティストの名前で検索をかけ、その結果取得したuriで検索)

// print_r($target_artist['artists']->items[0]->name."\n");
// SpotifyWebAPI::getArtistTopTracks($artistId, $options);
// $tracks[0] = $api->getArtistTopTracks($target_artist['artists']->items[0]->uri);
// var_dump($related_artists[0]->uri);
print_r(get_object_vars($api->getArtistTopTracks($target_artist['artists']->items[0]->uri,'country=JP'))['tracks'][0]->album->name."\n");
print_r('---------------------------------'."\n");

foreach($related_artists->artists as $related_artist){
    print_r($related_artist->name."\n");
    $track = $api->getArtistTopTracks($related_artist->uri,'country=JP');
    $track = get_object_vars($track);
    print_r($track['tracks'][0]->album->name."\n");
    // print_r($track[tracks]->name."\n");
    print_r('---------------------------------'."\n"); 

    // print_r($related_artist);
    // $track[$track_number] = $api->getArtistTopTracks($related_artist->uri);
    // $track_number += 1;
}
// SpotifyWebAPI::addPlaylistTracks($playlistId, $tracks, $options);
?>

