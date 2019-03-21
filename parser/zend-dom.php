<?php

echo "Running benchmark for zend-dom...\n";

use Zend\Dom\Query;

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = new Query($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        $document->execute('#posts')[0];

        // select multiple elements
        $document->execute('.post');

        // select child element
        $document->execute('#posts .post');
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("zend-dom" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $results['modification'][$range[$i]][] = array("zend-dom" => array(
        "time" => 'not support',
        "memory" => 'not support'
      ));
}
