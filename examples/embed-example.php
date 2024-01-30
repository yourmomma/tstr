<?php

require '../init.php';

$tractor = new Tractorscope\Embed('605e1c888519e453f7d82ed937e9d649');


$url = $tractor->getUrl([
  'dashboard' => 'dsh_01GAZZ3Z6R3AHC0K4FZVVP9EZQ',
  'filters' => [
    'user_id' => '1',
    'daterange' => 'all_dates'
  ],
  'latency' => 5
]);

echo $url;
