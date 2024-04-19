<?php

namespace App\Services;

use GuzzleHttp\Client;

class Afip {
    protected $url;
    protected $http;
    protected $headers;

    public function __construct(Client $client)
    {
        $this->url = env('AFIP_URL');
        $this->http = $client;
        $this->headers = [
            'content-type' => 'application/json'
        ];
    }

    public function generateInvoices(string $cuit, object $invoice) {
        $invoice_uri = "/users/{$cuit}/invoices";
        $full_path = $this->url .$invoice_uri;
        //return $full_path;

        $cae_response = $this->post($full_path, 'invoice', $invoice);
        //return $cae_response;
        if ($cae_response !== 'null') {
            //TODO: ERROR
        }

        return $cae_response;

    }

    private function post(string $path, string $body_name, object $body) {
        $request = $this->http->post($path, [
            'headers'           => $this->headers,
            'timeout'           => 30,
            'connect_timeout'   => true,
            'http_errors'       => true,
            'json'              => $body,
        ]);

        $response   = $request ? $request->getBody()->getContents(): null;
        $status     = $request ? $request->getStatusCode(): 500;

        if ($response && $status !== 500 && $response !== 'null') {
            return json_decode($response);
        }

        return null;
    }
}