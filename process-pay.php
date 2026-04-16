<?php
// NOTHING before this line (no spaces, no echo)

require_once 'phonepe-token.php';
require_once 'config.php';

$amount = (int)$_POST['amount'] * 100;
$orderId = uniqid('ORD_');
$token = getPhonePeAccessToken();

$redirectUrl = APP_BASE_URL . PHONEPE_SUCCESS_PATH . '?orderId=' . $orderId;

$payload = [
    "merchantOrderId" => $orderId,
    "amount" => $amount,
    "paymentFlow" => [
        "type" => "PG_CHECKOUT",
        "merchantUrls" => [
            "redirectUrl" => $redirectUrl
        ]
    ]
];

$ch = curl_init(PHONEPE_BASE_URL . "/checkout/v2/pay");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: O-Bearer " . $token
    ],
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false
]);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

/* ✅ REDIRECT PROPERLY */
if (!empty($data['redirectUrl']) || !empty($data['data']['paymentUrl'])) {

    $redirectUrl = $data['redirectUrl'] ?? $data['data']['paymentUrl'];

    // PHP redirect
    header("Location: " . $redirectUrl);
    exit;
}

/* ❌ only if something truly failed */
echo "<pre>";
print_r($data);
echo "</pre>";
