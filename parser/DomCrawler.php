<?php

echo "Running benchmark for DomCrawler...\n";

use Symfony\Component\DomCrawler\Crawler;

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = new Crawler($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        //$document->find('#posts')[0];
        $document->filter('#posts')->first();

        // select multiple elements
        $document->filter('.post');

        // select child element
        $document->filter('#posts .post');
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("DomCrawler" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);

    for ($j = 0; $j < $range[$i]; $j++) {
        $document = new Crawler($html);

        // modify element
        $node = $document->filter('.post')->first();
        $node->nodeValue = 'modified';

        // remove element
        $document->filter('.post')->each(function (Crawler $node, $k) {
            if($k == 0)
                return false;
            else {
                return true;
            }
        });

    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['modification'][$range[$i]][] = array("DomCrawler" => array(
        "time" => $time,
        "memory" => $memory
      ));
}
