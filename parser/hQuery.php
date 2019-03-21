<?php

echo "Running benchmark for hQuery...\n";

use duzun\hQuery;

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = hQuery::fromHTML($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        $document->find('#posts')[0];

        // select multiple elements
        $document->find('.post');

        // select child element
        $document->find('#posts .post');
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("hQuery" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $results['modification'][$range[$i]][] = array("hQuery" => array(
        "time" => 'not support',
        "memory" => 'not support'
      ));
}
