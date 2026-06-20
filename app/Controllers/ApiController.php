<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ApiController
{

    public function index()
    {
        $filters = [
            'name' => isset($_GET['name']) ? trim((string) $_GET['name']) : '',
            'type' => isset($_GET['type']) ? trim((string) $_GET['type']) : '',
            'muscle' => isset($_GET['muscle']) ? trim((string) $_GET['muscle']) : '',
            'difficulty' => isset($_GET['difficulty']) ? trim((string) $_GET['difficulty']) : '',
            'equipments' => isset($_GET['equipments']) ? trim((string) $_GET['equipments']) : '',
        ];

        $apiKey = $this->getApiNinjasKey();
        $apiKey = "QUqUL4ELmoVAA5FWUTGWN9WIQtQ2nKWzRvjJ4Ah9";
        $exerciseCards = $this->fetchExercisesFromApiNinjas($filters, $apiKey);

        return view('site/api', [
            'exerciseCards' => $exerciseCards,
            'apiStatus' => $apiKey ? ($exerciseCards ? 'online' : 'empty') : 'missing-key',
            'apiSource' => 'https://api.api-ninjas.com/v1/exercises',
            'filters' => $filters,
            'hasApiKey' => $apiKey !== '',
        ]);
    }

    private function fetchExercisesFromApiNinjas(array $filters, string $apiKey): array
    {
        if ($apiKey === '') {
            return [];
        }

        $query = array_filter($filters, static function ($value) {
            return $value !== '';
        });

        $cards = [];
        $seenNames = [];
        $nameTerms = $this->splitSearchTerms($filters['name'] ?? '');
        $searchTerms = $nameTerms ?: [''];

        foreach ($searchTerms as $nameTerm) {
            $queryForRequest = $query;

            if ($nameTerm !== '') {
                $queryForRequest['name'] = $nameTerm;
            } else {
                unset($queryForRequest['name']);
            }

            $queryString = $queryForRequest ? '?' . http_build_query($queryForRequest) : '';
            $response = $this->requestJson('https://api.api-ninjas.com/v1/exercises' . $queryString, $apiKey);

            if (!is_array($response)) {
                continue;
            }

            foreach ($response as $exercise) {
                $exerciseName = strtolower(trim((string) ($exercise['name'] ?? '')));

                if ($exerciseName !== '' && isset($seenNames[$exerciseName])) {
                    continue;
                }

                if ($exerciseName !== '') {
                    $seenNames[$exerciseName] = true;
                }

                $cards[] = [
                    'name' => $exercise['name'] ?? 'Exercise',
                    'description' => $this->formatDescription($exercise['instructions'] ?? ''),
                    'type' => $exercise['type'] ?? 'unknown',
                    'muscle' => $exercise['muscle'] ?? 'unknown',
                    'difficulty' => $exercise['difficulty'] ?? 'unknown',
                    'equipments' => isset($exercise['equipments']) && is_array($exercise['equipments']) ? $exercise['equipments'] : [],
                    'safetyInfo' => $this->formatDescription($exercise['safety_info'] ?? ''),
                ];
            }
        }

        return $cards;
    }

    private function splitSearchTerms(string $search): array
    {
        $terms = preg_split('/\s+/', trim($search)) ?: [];

        return array_values(array_filter(array_map('trim', $terms), static function ($term) {
            return $term !== '';
        }));
    }

    private function requestJson(string $url, string $apiKey): array
    {
        $payload = false;

        if (function_exists('curl_init')) {
            $curl = curl_init($url);

            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 8,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTPHEADER => [
                    'Accept: application/json',
                    'X-Api-Key: ' . $apiKey,
                    'User-Agent: Rastros-de-Fibra-Trainee/1.0',
                ],
            ]);

            $payload = curl_exec($curl);
            curl_close($curl);
        }

        if ($payload === false) {
            $context = stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'timeout' => 8,
                    'header' => "Accept: application/json\r\nX-Api-Key: {$apiKey}\r\nUser-Agent: Rastros-de-Fibra-Trainee/1.0\r\n",
                ],
                'ssl' => [
                    'verify_peer' => true,
                    'verify_peer_name' => true,
                ],
            ]);

            $payload = @file_get_contents($url, false, $context);
        }

        if ($payload === false) {
            return [];
        }

        $decoded = json_decode($payload, true);

        return is_array($decoded) ? $decoded : [];
    }

    private function getApiNinjasKey(): string
    {
        $candidates = [
            getenv('API_NINJAS_KEY') ?: '',
            getenv('API_NINJAS_API_KEY') ?: '',
            $_ENV['API_NINJAS_KEY'] ?? '',
            $_ENV['API_NINJAS_API_KEY'] ?? '',
            $_SERVER['API_NINJAS_KEY'] ?? '',
            $_SERVER['API_NINJAS_API_KEY'] ?? '',
        ];

        foreach ($candidates as $candidate) {
            $candidate = trim((string) $candidate);

            if ($candidate !== '') {
                return $candidate;
            }
        }

        return '';
    }

    private function formatDescription(string $description): string
    {
        $clean = trim(strip_tags($description));

        if ($clean === '') {
            return 'No description available.';
        }

        return mb_strlen($clean) > 180 ? mb_substr($clean, 0, 177) . '...' : $clean;
    }
}