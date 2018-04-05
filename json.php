<?php
    require __DIR__ . '/vendor/autoload.php';
    
    header('Content-Type: application/json');
    
    try {
        $ip_address = isset($_GET['ipaddress']) ? $_GET['ipaddress'] : null;
        if (!$ip_address)
            throw new Exception('Invalid IP address.');
        
        if ($ip_address === '@me')
            $ip_address = $_SERVER['REMOTE_ADDR'];
        
        // Search the cache
        $cache_filename = __DIR__ . '/cache/' . $ip_address . '.json';
        try {
            if (file_exists($cache_filename)) {
                $cache_time = filemtime($cache_filename);
                if ($cache_time < (time() - (60 * 60 * 24))) {
                    unlink($cache_filename);
                    throw new Exception('Cache expired.');
                }
                
                $response = json_decode(file_get_contents($cache_filename));
                
                if (isset($response->dbip))
                    unset($response->dbip);
                // $response->cached_since = date('Y-m-d H:i:s', $cache_time);
                
                echo json_encode($response, JSON_PRETTY_PRINT);
                exit();
            }
        } catch (Exception $err) {
            // Doesn't matter
        }
        
        $response = new stdClass();
        
        $response->ip = $ip_address;
        $response->hostname = gethostbyaddr($ip_address);
        
        $dbip = $response->dbip = DBIP\Address::lookup($ip_address);
        
        if ($dbip) {
            $response->city = $dbip->city;
            $response->country = $dbip->countryName;
            $response->country_iso2 = $dbip->countryCode;
            $response->continent = $dbip->continentName;
            $response->continent_iso2 = $dbip->continentCode;
        }
        
        $json = json_encode($response, JSON_PRETTY_PRINT);
        
        // Write to the cache
        $json = json_encode($response, JSON_PRETTY_PRINT);
        file_put_contents($cache_filename, $json);
        
        if (isset($response->dbip))
            unset($response->dbip);
        // $response->cache_filename = $cache_filename;
        
        echo json_encode($response, JSON_PRETTY_PRINT);
    } catch (Exception $err) {
        header('HTTP/1.1 500 Internal Server Error');
        // echo $err->getMessage();
        echo json_encode($err, JSON_PRETTY_PRINT);
    }
    
