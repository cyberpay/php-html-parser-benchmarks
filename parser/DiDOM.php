<?php

echo "Running benchmark for DiDOM...\n";

use DiDom\Document;

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = new Document($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        //$document->find('#posts')[0];
        $document->first('#posts');

        // select multiple elements
        $document->find('.post');

        // select child element
        $document->find('#posts .post');
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("DiDOM" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);

    for ($j = 0; $j < $range[$i]; $j++) {
        $document = new Document($html);

        // modify element
        $document->first('.post')->setInnerHtml('modified');
        // remove element
        $document->first('.post')->remove();
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['modification'][$range[$i]][] = array("DiDOM" => array(
        "time" => $time,
        "memory" => $memory
      ));
}
