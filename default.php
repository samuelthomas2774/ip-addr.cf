<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>ip-addr.cf</title>
    <meta name="description" content="View your IPv4 *and IPv6* address." />
    <meta name="keywords" content="ip internet protocol ipv4 ipv6 address ipaddress ipaddr" />
    <meta name="author" content="Samuel Elliott" />
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <style>
        .page {
            padding: 50px 0px;
        }
        .footer::before {
            content: "";
            display: block;
            width: 100%;
            max-width: 60px;
            height: 2px;
            margin: 30px 0px 10px;
            background-color: #eeeeee;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="container">
            <h1>ip-addr.cf</h1>
            <h3>Your current IP address is <?php echo htmlentities($_SERVER["REMOTE_ADDR"]); ?>.</h3>
            
            <h4>API</h4>
            <p>You can view this in JSON format at <code>https://ip-addr.cf/@me/json</code>:</p>
            <pre><code class="language-http">GET /@me/json HTTP/1.1
Host: ip-addr.cf

HTTP/1.1 200 OK

{
    "ip": "::1",
    "hostname": "localhost",
    "city": "New York",
    "country": "United States",
    "country_iso2": "US",
    "continent": "North America",
    "continent_iso2": "NA"
}
</code></pre>
            
            <h4>ip-addr.ml vs ip-addr.cf</h4>
            <p>ip-addr.ml and ip-addr.cf host exactly the same content but ip-addr.cf is routed through Cloudflare, and is generally preferred.</p>
        </div>
        <div class="container">
            <footer class="footer text-muted">
                <p><b>Samuel Elliott</b><br />
                    <a class="text-muted" href="mailto:samuel@fancy.org.uk">samuel@fancy.org.uk</a></p>
                <p><a class="text-muted" href="https://samuelelliott.ml">https://samuelelliott.ml</a><br />
                    <a class="text-muted" href="https://keybase.io/samuelthomas2774">https://keybase.io/samuelthomas2774</a></p>
            </footer>
        </div>
    </div>
    
    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push([ "trackPageView" ]);
        _paq.push([ "enableLinkTracking" ]);
        (function() {
            var url = "https://matomo.fancy.org.uk";
            _paq.push([ "setTrackerUrl", url + "/piwik.php" ]);
            _paq.push([ "setSiteId", "2" ]);
            
            var script = document.createElement("script"),
                firstscript = document.getElementsByTagName("script")[0];
            script.type = "text/javascript";
            script.async = true;
            script.defer = true;
            script.src = url + "/piwik.js";
            firstscript.parentNode.insertBefore(script, firstscript);
        })();
    </script>
</body>
</html>
