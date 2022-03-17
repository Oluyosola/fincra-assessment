<?php

namespace Vanguard\Dashboard\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class PaymentService
{
  public function payoutToIndividual($params)
  {
    $client = new Client(); 
    $headers = [
      'api-key' => env('FINCRA_API_KEY'),
      'Accept'        => 'application/json',
      'Content-Type' => 'application/json'
    ];
    try {
      $response = $client->request('POST', env('FINCRA_API_URL').'disbursements/payouts',[
        'body' => json_encode($params), 'headers' => $headers 
      ]);
      $result = json_decode($response->getBody()->getContents());
      return $result;
    }catch (RequestException $e) {
      Log::info($e);
      throw $e;
      // return  array('status' => false, 'message' => 'Unable process transfer. Please again later');
    }
  }
}