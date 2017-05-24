<?php

    $dirname = realpath(__DIR__ . '/..');
    include_once($dirname . '/vendor/Facebook/autoload.php');

    $fb = new Facebook\Facebook([
      'app_id' => '1197673717010008',
      'app_secret' => '554fb8836bd64d96a80af2c9c7181331',
      'default_graph_version' => 'v2.9',
    ]);
?>
