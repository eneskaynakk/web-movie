<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Artist;
use Illuminate\Support\Facades\Log;

class ProcessJsonArtist extends Command
{
    protected $signature = 'process:jsonartist';

    protected $description = 'Process JSON data and store in database';

    public function handle()
    {
        $artists = array();
        $client = new Client();

        for($i = 1; $i <= 2; $i++) {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/person/popular?language=tr-TR&page=' . $i, [
                'headers' => [
                  'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0YzA4NTk1ODEwYzc5NzBhMjIwOGZjODI4M2VhNjkwZSIsInN1YiI6IjY2MjI5YjM5M2Y0ODMzMDE4Njc1N2JkMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QhWNgsi-mdrB97SR61KfFanE8p3jhw3Mz6MADUhflBE',
                  'accept' => 'application/json',
                ]
            ]);
            $json = $response->getBody()->getContents();
            $data = json_decode($json, true);
            $artists = array_merge($artists, $data['results']);
        }

        foreach($artists as $key => $artist) {
            $detailResponse = $client->request('GET', 'https://api.themoviedb.org/3/person/' . $artist['id'] . '?language=tr-TR', [
                'headers' => [
                  'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0YzA4NTk1ODEwYzc5NzBhMjIwOGZjODI4M2VhNjkwZSIsInN1YiI6IjY2MjI5YjM5M2Y0ODMzMDE4Njc1N2JkMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QhWNgsi-mdrB97SR61KfFanE8p3jhw3Mz6MADUhflBE',
                  'accept' => 'application/json',
                ],
            ]);
            $detailJson = $detailResponse->getBody()->getContents();
            $detailID = json_decode($detailJson, true)['id'];
        }

        foreach ($artists as $artist) {
            if (isset($artist['id']) && isset($artist['profile_path'])) {
                $artistData = [
                    'artistID' => $artist['id'],
                    'poster' => 'https://image.tmdb.org/t/p/w500' . $artist['profile_path'],
                    'name' => $artist['name'],
                    'sector' => $artist['known_for_department'],
                    'popularity' => $artist['popularity'],

                ];
                Artist::create($artistData);
            }
        }
        Log::info('JSON data processed and stored in database.');
    }
}
