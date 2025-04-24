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