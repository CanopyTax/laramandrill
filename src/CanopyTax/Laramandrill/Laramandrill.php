<?php namespace CanopyTax\Laramandrill;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Laramandrill
{
    protected $apiKey;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->apiKey = config('laramandrill.api_key');
    }

    public static function request($httpVerb, $callName, array $arguments)
    {
        // Validations
        if (!self::_validateRequestVerb($httpVerb)) {
            throw new \Exception("You must pass a proper verb: get, head, post, put, delete or options");
        }
        // Setup
        $api_key = config('laramandrill.api_key');
        $verify = config('laramandrill.verify');
        $output = config('laramandrill.output');
        $api_base_url = config('laramandrill.api_base_url');

        // determine endpoint
        $client = new Client([]);
        $endpoint = $api_base_url.$callName . '.' . $output;

        // build payload
        $arguments['key'] = $api_key;
        $httpVerb = strtoupper($httpVerb);

        $options = [
            'headers' => [
                'User-Agent' => 'laramandrill/1.0',
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode($arguments),
            'verify' => $verify,
        ];

        try {
            $response = $client->request($httpVerb, $endpoint, $options);
            return $response->getBody();
        } catch (RequestException $e) {
            echo $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }
        }
        throw new \Exception('Unknown issue with mandrill request/response');
    }

    /**
     * _validateRequestVerb
     * @param $verb
     * @return bool
     */
    public static function _validateRequestVerb($verb)
    {
        return in_array($verb, ['get', 'head', 'post', 'put', 'delete', 'options']);
    }
}
