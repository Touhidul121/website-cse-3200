<?php
define('CF_API', '7bc181b89e46b874d525bb4e2eb90fda92208a9e');
define('CF_SECRET', 'bcc98732e030909f15678d9c93b941c0d8247dc9');

// Implement the codeforces API
class CodeforcesAPI {
    private $api;
    private $secret;

    public function __construct($api, $secret) {
        $this->api = $api;
        $this->secret = $secret;
    }

    public function get($method, $params = array()) {
        $params['apiKey'] = $this->api;
        $params['time'] = time();
        // get 6 random characters
        $random_chars = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

        // sha512hex hash of the random characters and others
        $params['apiSig'] = $random_chars . hash('sha512', $random_chars . '/' . $method . '?' . http_build_query($params, '', '&') . '#' . $this->secret);
        $url = 'https://codeforces.com/api/' . $method . '?' . http_build_query($params, '', '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}

// Create a new instance of the API
$api = new CodeforcesAPI(CF_API, CF_SECRET);

// Get the user's handle
$handle = $_GET['handle'];

// Get the constest list
$contests = $api->get('contest.list');
print_r($contests);