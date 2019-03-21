<?php

echo "Running benchmark for phphtmlparser...\n";

use PHPHtmlParser\Dom;

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = new Dom;
    $document->load($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        $document->find('#posts')[0];

        // select multiple elements
        $document->find('.post')[0];

        // select child element
        $document->find('#posts .post');
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("phphtmlparser" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);

    for ($j = 0; $j < $range[$i]; $j++) {
        $document = new DOM;
        $document->load($html);
        // modify element
        $document->find('.post')[0]->firstChild()->setText('modified');
        // remove element
        $document->find('.post')[0]->delete();
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['modification'][$range[$i]][] = array("phphtmlparser" => array(
        "time" => $time,
        "memory" => $memory
      ));
}
