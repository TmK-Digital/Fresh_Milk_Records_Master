<?php

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '2954324477977774',
  'app_secret'     => '8d5d65b055622e02b02edd6f5812aa66',
  'default_graph_version'  => 'v2.10'
]);

?>
