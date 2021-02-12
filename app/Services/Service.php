<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use GuzzleHttp;
use GuzzleHttp\Psr7\Response as Psr7Response;

class Service
{
    protected $token;
    private $timeout = 30;

    public function __construct()
    {
        $this->token = session('token', null);
        $this->client = new GuzzleHttp\Client([
            'base_uri' => env('API_HOST'),
            'defaults' => [
                'exceptions' => false
            ]
        ]);
    }

    public function get($url, $queryParams = [])
    {
        // try {

            $apiRequest = $this->client->request('GET', "api$url", [
                'headers' =>
                [
                  'Authorization' => 'Bearer '.$this->token
                ]
              ]);

            return $apiRequest;

        // } catch (Exception $error) {
        //     abort(408, $error->getMessage());
        // }
    }

    public function post($url, $data = [])
    {
        // try {
            $apiRequest = $this->client->request('POST', "api$url", [
                'form_params' => $data,
                'headers' =>
                [
                  'Authorization' => 'Bearer '.$this->token
                ]
              ]);

            return $apiRequest;

        // } catch (Exception $error) {
            // abort(408, "Connection Timeout: $url");
        // }
    }

    // public function postWithFile($url, $files = [], $data = [])
    // {
    //     try {
    //         $result = Http::withToken($this->token)
    //                      ->asMultipart();
    //         foreach ($files as $v) {
    //             $result = $result->attach($v['file_extension'], fopen($v['file'], 'r'), $v['file_name']);
    //         }

    //         $result = $result->timeout($this->timeout)
    //         ->post(env('API_HOST').$url, $data);

    //         return $result;
    //     } catch (Exception $error) {
    //         abort(408, "Connection Timeout: $url");
    //     }
    // }

    // public function postUploadImage($url, $files = [], $data = [])
    // {
    //     try {
    //         $result = Http::withToken($this->token)
    //                      ->asMultipart();
    //         foreach ($files as $v) {
    //             $result = $result->attach($v['payload_name'], fopen($v['file'], 'r'), $v['file_name']);
    //         }

    //         $result = $result->timeout($this->timeout)
    //         ->post(env('API_HOST').$url, $data);

    //         return $result;
    //     } catch (Exception $error) {
    //         abort(408, "Connection Timeout: $url");
    //     }
    // }

    public function put($url, $data = [])
    {
        try {
            $apiRequest = $this->client->request('PUT', "api$url", [
                'form_params' => $data,
                'headers' =>
                [
                  'Authorization' => 'Bearer '.$this->token
                ]
              ]);

            return $apiRequest;
        } catch (Exception $error) {
            abort(408, "Connection Timeout: $url");
        }
    }

    public function patch($url, $data = [])
    {
        // try {
            $apiRequest = $this->client->request('PATCH', "api$url", [
                'form_params' => $data,
                'headers' =>
                [
                  'Authorization' => 'Bearer '.$this->token
                ]
              ]);

            return $apiRequest;
        // } catch (Exception $error) {
        //     abort(408, "Connection Timeout: $url");
        // }
    }

    public function delete($url, $data = [])
    {
        // try {
            $apiRequest = $this->client->request('DELETE', "api$url", [
                'headers' =>
                [
                  'Authorization' => 'Bearer '.$this->token
                ]
              ]);

            return $apiRequest;
        // } catch (Exception $error) {
        //     abort(408, "Connection Timeout: $url");
        // }
    }

    public function showResponse(Psr7Response $response)
    {
        return json_decode($response->getBody(), true);
    }
}
