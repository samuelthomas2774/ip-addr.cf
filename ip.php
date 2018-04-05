<?php
    require __DIR__ . '/vendor/autoload.php';
    
    header('Content-Type: text/plain');
    
    try {
        $ip_address = isset($_GET['ipaddress']) ? $_GET['ipaddress'] : null;
        if (!$ip_address)
            throw new Exception('Invalid IP address.');
        
        if ($ip_address === '@me')
            $ip_address = $_SERVER['REMOTE_ADDR'];
        
        echo $ip_address . "\n";
    } catch (Exception $err) {
        header('HTTP/1.1 500 Internal Server Error');
        echo $err->getMessage() . "\n";
    }
    
