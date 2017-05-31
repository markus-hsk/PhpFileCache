<?php
/**
 * Created by PhpStorm.
 * User: Markus
 * Date: 31.05.2017
 * Time: 19:39
 */

require_once __DIR__.'/Cache.class.php';

use MBuscher\Cache as Cache;


$runtimes = 1000;


echo '<h1>PhpFileCache</h1>';

$time = -microtime(true);

for($i = 0; $i < $runtimes; $i++)
{
    Cache::set('mykey'.$i, $i);

    $value = Cache::get('mykey'.$i);

    if($value != $i)
    {
        echo "<div style='color:red; font-weight:bold; background-color:lightcoral; outline: 2px solid red;'>Error in iteration step $i, got $value!</div>";
        break;
    }
}


$time += microtime(true);
echo "<div>Runtime for $i iterations: $time Sek</div>";