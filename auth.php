<?php
session_start();
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '674830028d00453288807f07cfe372c3',
    'd1d71d40e87b4f05b0931abfc4c66a0b',
    // 'http://acad.itpwebdev.com/~chun960/Spotify/callback.php'
    'https://spotifychromatic.herokuapp.com/callback.php'

);

$options = [
    'scope' => [
        'playlist-read-private',
        'user-top-read',
        'user-read-currently-playing',
        'user-read-email',
        'user-read-private',
        'user-follow-read'
    ],
];


header('Location: ' . $session->getAuthorizeUrl($options));
die();

?>
