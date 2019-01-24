<?php
// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
// Used for composer based installation
require __DIR__  . '/PayPal-PHP-SDK/autoload.php';
// Use below for direct download installation
// require __DIR__  . '/PayPal-PHP-SDK/autoload.php';

// After Step 1
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AYhhlts1dB9gcXfODZTCTDsn77Rpe8PSM4t5YmKnTNqzysebBYO_LzFTDLTX1BQk8zr3MRCHeTsgBEL7',     // ClientID
        'ELLRAohgiEsy6oAN5U1k3E4-U2m_2e8jQFFLO_xyYCRg5cIQHRm01xSAwXhbLR37iLmGkyh8EM_ghM6k'      // ClientSecret
    )
);
?>