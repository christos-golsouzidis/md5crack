<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christos Golsouzidis MD5 Cracker</title>
</head>
<body>
    <p>
        This application takes an MD5 hash of a four-digit pin and checks
        all 10000 possible four digit PINs to determine the original PIN.
    </p>
    <pre>
Debug Output:
MD5 Hash                          PIN
--------------------------------|----
<?php

function check($md5)
{
    $digitstr = "0123456789";
    $c0 = 0;

    for($d0 = 0; $d0 < 10; $d0++)
    {
        for($d1 = 0; $d1 < 10; $d1++)
        {
            for($d2 = 0; $d2 < 10; $d2++)
            {
                for($d3 = 0; $d3 < 10; $d3++)
                {
                    $pin = "$digitstr[$d0]"."$digitstr[$d1]"."$digitstr[$d2]"."$digitstr[$d3]";
                    $md5try = hash('md5', $pin);
                    if($c0 < 15)
                        echo "$md5try"." "."$pin"."\n";
                    $c0++;

                    if($md5try === $md5)
                        return "\nPIN: $pin\n";
                }
            }
        }
    }
    return "\nNot found\n";
}

if ( isset($_GET['md5']) )
{
    $time_start = microtime(true);
    $md5 = $_GET['md5'];
    
    print(check($md5));
    echo "\n";

    $time_delta = microtime(true) - $time_start;
    echo "Ellapsed time: $time_delta\n";
}

?>

    </pre>
    <form method="GET">
    <input type="text" name="md5" size="40">
    <input type="submit" value="Check">
    </form>
</body>
</html>