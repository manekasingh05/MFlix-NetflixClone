<?php
require_once("PayPal-PHP-SDK/autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AXndFmYyQ7mjX7jr3fAu_qP_pYGgv37pN4P9WDB9jXjMDDTpWJxDrvpS-dk4tT-nHFp0LlDMWBWXpWWZ',     // ClientID
        'ED6khlrEkyOq0FbuGavzRoAlnmF6BP5HMMkaa_doicAqomNHHNEugm_ssX2d71qRbqvv_PYZrk0O6h2t'      // ClientSecret
    )
);
?>