<?php

echo "Running benchmark for DOMDocument...\n";

// HTML Element Search

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);
    $document = new DOMDocument();
    $document->loadHTML($html);

    for ($j = 0; $j < $range[$i]; $j++) {
        // select single element
        $document->getElementById('posts');

        // select multiple elements
        $childNodeList = $document->getElementsByTagName('div');
        $nodes = array();
        for ($k = 0; $k < $childNodeList->length; $k++) {
            $temp = $childNodeList->item($k);
            if (stripos($temp->getAttribute('class'), 'post') !== false) {
                $nodes[] = $temp;
            }
        }

        // select child element
        $childNodeList = $document->getElementById('posts')->getElementsByTagName('div');
        $nodes = array();
        for ($k = 0; $k < $childNodeList->length; $k++) {
            $temp = $childNodeList->item($k);
            if (stripos($temp->getAttribute('class'), 'post') !== false) {
                $nodes[] = $temp;
            }
        }
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['search'][$range[$i]][] = array("DOMDocument" => array(
        "time" => $time,
        "memory" => $memory
      ));
}

// HTML Element Modification

for ($i = 0; $i < count($range); $i++) {
    $startMemory = memory_get_usage();
    $startTime = microtime(true);

    for ($j = 0; $j < $range[$i]; $j++) {
        $document = new DOMDocument();
        $document->loadHTML($html);

        // modify element
        $childNodeList = $document->getElementsByTagName('div');
        for ($k = 0; $k < $childNodeList->length; $k++) {
            $temp = $childNodeList->item($k);
            if (stripos($temp->getAttribute('class'), 'post') !== false) {
                $temp->nodeValue = 'modified';
                break;
            }
        }

        // remove element
        $childNodeList = $document->getElementsByTagName('div');
        for ($k = 0; $k < $childNodeList->length; $k++) {
            $temp = $childNodeList->item($k);
            if (stripos($temp->getAttribute('class'), 'post') !== false) {
                $temp->parentNode->removeChild($temp);
                break;
            }
        }
    }

    $time = microtime(true) - $startTime;
    $memory = memory_get_usage() - $startMemory;

    $results['modification'][$range[$i]][] = array("DOMDocument" => array(
        "time" => $time,
        "memory" => $memory
      ));
}


