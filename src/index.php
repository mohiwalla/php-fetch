<?php

namespace mohiwalla\PHPfetch;

use InvalidArgumentException;
use RuntimeException;

class FetchUtility
{
    public static function fetch(string $url, array $options = [])
    {
        $ch = curl_init();

        $defaults = [
            'method' => 'GET',
            'headers' => [],
            'body' => '',
            'timeout' => 30,
            'ssl_verify' => false,
        ];

        $options = (object) array_merge($defaults, $options);

        $method = strtoupper($options->method);
        if (!in_array($method, ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'HEAD'])) {
            throw new InvalidArgumentException('Invalid method specified.');
        }

        $headers = [];
        foreach ($options->headers as $key => $value) {
            $headers[] = "$key: $value";
        }

        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $method !== 'GET' ? $options->body : null,
            CURLOPT_TIMEOUT => $options->timeout,
            CURLOPT_SSL_VERIFYPEER => $options->ssl_verify,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($ch);
        if ($response === false) {
            throw new RuntimeException('cURL error: ' . curl_error($ch));
        }

        curl_close($ch);
        return $response;
    }
}
