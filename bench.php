<?php

require 'vendor/autoload.php';

$filepath = __DIR__.'/html/index.html';
$html = file_get_contents($filepath);
$range = array(10000);
$results = array();

require './parser/DOMDocument.php';
require './parser/DiDOM.php';
require './parser/DomCrawler.php';
require './parser/hQuery.php';
require './parser/html5-dom-document-php.php';
require './parser/nokogiri.php';
require './parser/simplehtmldom.php';
require './parser/zend-dom.php';
require './parser/phphtmlparser.php';

foreach ($results as $type => $value){
    foreach ($value as $loop => $valueB) {
        printf("============= %s, %s times=============\n", $type, $loop);
        $table = new LucidFrame\Console\ConsoleTable();
        $table->addHeader('Parser')
            ->addHeader('Time (sec)')
            ->addHeader('Memory (kB)');
        
        usort($valueB, function($a, $b) {
            $a = is_numeric($a[key($a)]['time']) ? $a[key($a)]['time'] : 5e5;
            $b = is_numeric($b[key($b)]['time']) ? $b[key($b)]['time'] : 5e5;
            return $a <=> $b;
        });

        foreach ($valueB as $index => $valueC) {
            foreach ($valueC as $parser => $valueD) {
                $time = is_numeric($valueD['time']) ? number_format($valueD['time'], 3) : $valueD['time'];
                $memory = $valueD['memory'];
                if(is_numeric($memory) and $memory > 0){
                    $memory = $memory / 1024;
                    if($memory < 1){
                        $memory = number_format($memory, 3);
                    }
                    else{
                        $memory = floor($memory);
                    }
                }
                $memory_limit = ini_get('memory_limit');
                $table->addRow()
                ->addColumn($parser)
                ->addColumn($time)
                ->addColumn($memory);
            }
        }

        $table->display();
    }
}

file_put_contents('./bechmark-results.json', json_encode($results, JSON_PRETTY_PRINT));

echo "Results saved to bechmark-results.json\n";
