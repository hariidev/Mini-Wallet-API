<?php

$storageFile = 'wallet.json';

function loadWallet() {
    global $storageFile;
    if (!file_exists($storageFile)) {
        file_put_contents($storageFile, json_encode([]));
    }
    return json_decode(file_get_contents($storageFile), true);
}

function saveWallet($data) {
    global $storageFile;
    file_put_contents($storageFile, json_encode($data));
}

function deposit($userId, $amount) {
    $wallet = loadWallet();
    if ($amount <= 0) {
        return ['error' => 'Amount must be positive.'];
    }
    if (!isset($wallet[$userId])) {
        $wallet[$userId] = ['balance' => 0, 'transactions' => []];
    }
    $wallet[$userId]['balance'] += $amount;
    $wallet[$userId]['transactions'][] = ['type' => 'deposit', 'amount' => $amount, 'date' => date('Y-m-d H:i:s')];
    saveWallet($wallet);
    return ['balance' => $wallet[$userId]['balance']];
}

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
parse_str(parse_url($requestUri, PHP_URL_QUERY), $queryParams);

header('Content-Type: application/json');

if ($requestMethod === 'POST' && strpos($requestUri, '/deposit') !== false) {
    $userId = $queryParams['user_id'] ?? null;
    $amount = isset($queryParams['amount']) ? floatval($queryParams['amount']) : 0;
    echo json_encode(deposit($userId, $amount));
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found.']);
}