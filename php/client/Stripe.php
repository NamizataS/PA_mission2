<?php
class Stripe {

    private $apiKey;

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    public function api(string $endpoint, array $data): stdClass {

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.stripe.com/v1/$endpoint",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD => $this->apiKey,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_POSTFIELDS => http_build_query($data)
        ]);

        $response = json_decode(curl_exec($ch));

        curl_close($ch);

        if(property_exists($response, 'error')) {
            throw new Exception($response->error->message);
        }
        return $response;
    }
}