<?php

echo "Running benchmark for Simple HTML DOM...\n";

use Sunra\PhpSimple\HtmlDomParser;

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = HtmlDomParser::str_get_html($html);

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

    $results['search'][$range[$i]][] = array("SimpleHTMLDOM" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);

    for ($j = 0; $j < $range[$i]; $j++) {
        $document = HtmlDomParser::str_get_html($html);

        // modify element
        $document->find('.post')[0]->innertext = 'modified';
        // remove element
        $document->find('.post')[0]->outertext = '';
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['modification'][$range[$i]][] = array("SimpleHTMLDOM" => array(
        "time" => $time,
        "memory" => $memory
      ));
}
