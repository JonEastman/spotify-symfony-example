<?php

namespace AppBundle\Utils;

use GuzzleHttp\Client;

class SpotifyManager {

    const SPOTIFY_API = 'https://api.spotify.com/v1/';
    const TYPE_TRACK = 'track';
    const TYPE_ALBUM = 'album';

    public function search($query) {

        $client = new Client();

        $response = $client->get(SpotifyManager::SPOTIFY_API . 'search', [
            'query' => [
                'q' => urlencode($query),
                'type' => SpotifyManager::TYPE_ALBUM,
            ]
        ]);

        return $response->json()['albums'];
    }

    public function getAlbum($id) {

        $client = new Client();

        $response = $client->get(SpotifyManager::SPOTIFY_API . 'albums/' . $id);

        return $response->json();
    }
}