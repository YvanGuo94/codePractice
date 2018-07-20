<?php
/**
 * Created by PhpStorm.
 * User: onehome_gyf
 * Date: 18/7/20
 * Time: 下午4:21
 */


$ch_1 = curl_init('http://localhost:8866/jsonptimeout.php?callback=qqq');
$ch_2 = curl_init('http://localhost:8866/jsonptimeout.php?callback=qqq');
curl_setopt($ch_1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_2, CURLOPT_RETURNTRANSFER, true);

// build the multi-curl handle, adding both $ch
$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch_1);
curl_multi_add_handle($mh, $ch_2);

$t1 = microtime(true);
// execute all queries simultaneously, and continue when all are complete
  $running = null;
  do {
      curl_multi_exec($mh, $running);
  } while ($running);

$t2 = microtime(true);

//close the handles
curl_multi_remove_handle($mh, $ch_1);
curl_multi_remove_handle($mh, $ch_2);
curl_multi_close($mh);

// all of our requests are done, we can now access the results
$response_1 = curl_multi_getcontent($ch_1);
$response_2 = curl_multi_getcontent($ch_2);
echo "$response_1 $response_2"; // output results


header("Content-type: application/json; charset=utf-8");
echo '耗时'.round($t2-$t1,3).'秒';