<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Movie;
use Illuminate\Support\Facades\Log;

class ProcessJsonData extends Command
{
    protected $signature = 'process:json';

    protected $description = 'Process JSON data and store in database';

    public function handle()
    {
        $movies = array();
        $client = new Client();

        $urls = [
            'https://api.themoviedb.org/3/movie/popular?language=tr-TR&page=',
            'https://api.themoviedb.org/3/movie/top_rated?language=tr-TR&page=',
            'https://api.themoviedb.org/3/movie/upcoming?language=tr-TR&page='
        ];

        foreach ($urls as $url) {
            for ($i = 1; $i <= 2; $i++) {
                $response = $client->request('GET', $url . $i, [
                    'headers' => [
                        'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0YzA4NTk1ODEwYzc5NzBhMjIwOGZjODI4M2VhNjkwZSIsInN1YiI6IjY2MjI5YjM5M2Y0ODMzMDE4Njc1N2JkMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QhWNgsi-mdrB97SR61KfFanE8p3jhw3Mz6MADUhflBE', // Your TMDB API key
                        'accept' => 'application/json',
                    ]
                ]);
                $json = $response->getBody()->getContents();
                $data = json_decode($json, true);
                $movies = array_merge($movies, $data['results']);
            }
        }

        foreach ($movies as $key => $movie) {
            $detailResponse = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $movie['id'] . '?language=tr-TR', [
                'headers' => [
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0YzA4NTk1ODEwYzc5NzBhMjIwOGZjODI4M2VhNjkwZSIsInN1YiI6IjY2MjI5YjM5M2Y0ODMzMDE4Njc1N2JkMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QhWNgsi-mdrB97SR61KfFanE8p3jhw3Mz6MADUhflBE',  // Your TMDB API key
                    'accept' => 'application/json',
                ],
            ]);

            $detailJson = $detailResponse->getBody()->getContents();
            $detailID = json_decode($detailJson, true)['imdb_id'];

            $detailResponse = $client->request('GET', 'http://www.omdbapi.com/?apikey=16c323f4&i=' . $detailID, [
                'headers' => [
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0YzA4NTk1ODEwYzc5NzBhMjIwOGZjODI4M2VhNjkwZSIsInN1YiI6IjY2MjI5YjM5M2Y0ODMzMDE4Njc1N2JkMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.QhWNgsi-mdrB97SR61KfFanE8p3jhw3Mz6MADUhflBE',
                    'accept' => 'application/json',
                ],
            ]);

            $IMDBDetailJson = $detailResponse->getBody()->getContents();
            $movies[$key]['imdb_detail'] = json_decode($IMDBDetailJson, true);
        }

        foreach ($movies as $movie) {
            $imdbDetail = $movie['imdb_detail'];

            if (isset($imdbDetail['imdbID']) && $imdbDetail['imdbRating'] !== 'N/A') {
                $movieData = [
                    'imdbID' => $imdbDetail['imdbID'],
                    'title' => $imdbDetail['Title'],
                    'year' => $imdbDetail['Year'],
                    'rated' => $imdbDetail['Rated'],
                    'runtime' => $imdbDetail['Runtime'],
                    'rating' => $imdbDetail['imdbRating'],
                    'poster' => $imdbDetail['Poster'],
                    'genre' => $imdbDetail['Genre'],
                    'plot' => $imdbDetail['Plot'],
                    'director' => $imdbDetail['Director'],
                    'writer' => $imdbDetail['Writer'],
                    'actor' => $imdbDetail['Actors'],
                    'type' => $imdbDetail['Type'],
                    'country' => $imdbDetail['Country'],
                    'award' => $imdbDetail['Awards'],
                    'imdbVote' => $imdbDetail['imdbVotes']
                ];

                Movie::create($movieData);
            }
        }

        Log::info('JSON data processed and stored in database.');
    }
}
