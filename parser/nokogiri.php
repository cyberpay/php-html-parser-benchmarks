<?php

echo "Running benchmark for nokogiri...\n";

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = new nokogiri($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        //$document->find('#posts')[0];
        $document->get('#posts');

        // select multiple elements
        $document->get('.post')->toArray();

        // select child element
        $document->get('#posts .post')->toArray();
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("nokogiri" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $results['modification'][$range[$i]][] = array("nokogiri" => array(
            "time" => 'not support',
            "memory" => 'not support'
          ));
}
