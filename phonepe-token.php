<?php
require_once 'config.php';

function getPhonePeAccessToken()
{
    $payload = http_build_query([
        'client_id' => PHONEPE_CLIENT_ID,
        'client_secret' => PHONEPE_CLIENT_SECRET,
        'client_version' => PHONEPE_CLIENT_VERSION,
        'grant_type' => 'client_credentials'
    ]);

    $ch = curl_init(PHONEPE_OAUTH_URL);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/x-www-form-urlencoded'
        ],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (empty($data['access_token'])) {
        throw new Exception('OAuth failed');
    }

    return $data['access_token'];
}
