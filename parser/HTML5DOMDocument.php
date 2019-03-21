<?php

echo "Running benchmark for HTML5DOMDocument...\n";

use DiDom\Document;

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = new IvoPetkov\HTML5DOMDocument();
    $document->loadHTML($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        $document->querySelector('#posts');

        // select multiple elements
        $document->querySelectorAll('.post');

        // select child element
        $document->querySelectorAll('#posts .post');
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("HTML5DOMDocument" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);

    for ($j = 0; $j < $range[$i]; $j++) {
        $document = new IvoPetkov\HTML5DOMDocument();
        $document->loadHTML($html);

        // modify element
        $document->querySelector('.post')->innerHTML = 'modified';

        // remove element
        $node = $document->querySelector('.post');
        $node->parentNode->removeChild($node);
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['modification'][$range[$i]][] = array("HTML5DOMDocument" => array(
        "time" => $time,
        "memory" => $memory
      ));
}
