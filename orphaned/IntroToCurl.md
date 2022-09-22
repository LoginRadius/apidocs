# An Intro to Curl & Fsockopen – LoginRadius

## What are they?

cURL and Fsock are both methods used to communicate with different types of servers using communication protocols. Fsock is included in PHP and cURL is a library that can be installed on a server or utilized on many different platforms.

### Examples:

#### cURL-





#### Fsock-


        n";
            } else {
                $out = "GET / HTTP/1.1rn";
                $out .= "Host: http://www.example.comrn" ;"="">www.example.comrn";
                $out .= "Connection: Closernrn";
                fwrite($fp, $out);
                while (!feof($fp)) {
                    echo fgets($fp, 128);
                }
                fclose($fp);
            }
        ?>


## How to check if you have cURL enabled

Run phpinfo() to see if curl is enabled on your server then navigate to the curl section. You will see the setting cURL support - enabled or disabled.





Or use the php script below to create a curl_check.php file


        installed on this server";
            } else {
              echo "cURL is NOT installed on this server";
            }
        ?>


After saving this file as curl_check.php load it on a server installed with PHP and run the path yourpath/curl_check.php you will see a message shown that notifies you if cURL is enabled or disabled

## Check if fsockopen function exists





Normally, by default your server will have curl enabled and ready to use on your server. It is the most commonly used method to communicate to different types of servers. If you're ever having a problem communicating with a server run one of the above checks to verify your curl and fsock is working correctly.
