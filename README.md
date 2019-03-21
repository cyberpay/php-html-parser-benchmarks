

# PHP HTML Parser Benchmarks

Simple benchmark test for PHP HTML Parser.

# Installation
Download from the [release page](https://github.com/ewwink/php-html-parser-benchmarks/releases) or clone the repo

    git clone https://github.com/ewwink/php-html-parser-benchmarks
    cd php-html-parser-benchmarks

Install required dependency using [composer](https://getcomposer.org/download/)

    composer install
    
Run the benchmark

    php bench.php

# Included Parser
- [DOMDocument](http://php.net/manual/en/class.domdocument.php)
- [DiDOM](https://github.com/Imangazaliev/DiDOM)
- [DomCrawler](https://github.com/symfony/dom-crawler)
- [hQuery](https://github.com/duzun/hQuery.php)
- [HTML5DOMDocument](https://github.com/ivopetkov/html5-dom-document-php)
- [nokogiri](https://github.com/olamedia/nokogiri)
- [Simple HTML DOM](https://github.com/sunra/php-simple-html-dom-parser)
- [zend-dom](https://github.com/zendframework/zend-dom)
- [PHP Html Parser](https://github.com/paquettg/php-html-parser)
 
# Test Environment
- **OS**: Windows 7 64bit
- PHP 7.1.4 (cli)  ( ZTS MSVC14 (Visual C++ 2015) x86 )
- Python 3.7.0

# Benchmark Results
note: `*` element modification not supported

### Search element 100 iteration

    +------------------------+------------+-------------+
    | Parser                 | Time (sec) | Memory (kB) |
    +------------------------+------------+-------------+
    | hQuery*                | 0.047      | 499         |
    | HTML5DOMDocument       | 0.047      | 2339        |
    | DOMDocument            | 0.062      | 0.664       |
    | nokogiri*              | 0.062      | 5350        |
    | SimpleHTMLDOM          | 0.062      | 402         |
    | DiDOM                  | 0.078      | 297         |
    | phphtmlparser          | 0.094      | 357         |
    | zend-dom*              | 0.094      | 70          |
    | DomCrawler             | 0.109      | 505         |
    +------------------------+------------+-------------+
    | BeautifulSoup (Python  | 0.078      | -           |
    +------------------------+------------+-------------+

### Search element 1000 iteration

    +------------------------+------------+-------------+
    | Parser                 | Time (sec) | Memory (kB) |
    +------------------------+------------+-------------+
    | DOMDocument            | 0.016      | 0           |
    | hQuery*                | 0.047      | 0           |
    | SimpleHTMLDOM          | 0.140      | 75          |
    | HTML5DOMDocument       | 0.234      | 2557        |
    | DiDOM                  | 0.234      | 0           |
    | nokogiri*              | 0.296      | -           |
    | DomCrawler             | 0.468      | 0           |
    | zend-dom*              | 0.640      | 0           |
    | phphtmlparser          | 0.720      | 74          |
    +------------------------+------------+-------------+
    | BeautifulSoup (Python  | 0.876      | -           |
    +------------------------+------------+-------------+

### Search element 10000 iteration

    +------------------------+------------+-------------+
    | Parser                 | Time (sec) | Memory (kB) |
    +------------------------+------------+-------------+
    | DOMDocument            | 0.187      | 0           |
    | hQuery*                | 0.485      | 0           |
    | SimpleHTMLDOM          | 1.405      | 75          |
    | DiDOM                  | 2.325      | 0           |
    | HTML5DOMDocument       | 2.419      | 84          |
    | nokogiri*              | 2.871      | 0           |
    | DomCrawler             | 4.557      | 0           |
    | zend-dom*              | 6.242      | 0           |
    | phphtmlparser          | 7.210      | 74          |
    +------------------------+------------+-------------+
    | BeautifulSoup (Python  | 8.755      | -           |
    +------------------------+------------+-------------+

### Element modification 100 iteration

    +------------------------+-------------+-------------+
    | Parser                 | Time (sec)  | Memory (kB) |
    +------------------------+-------------+-------------+
    | DOMDocument            | 0.016       | 0.047       |
    | DiDOM                  | 0.031       | 0.063       |
    | DomCrawler             | 0.047       | 0.766       |
    | HTML5DOMDocument       | 0.047       | -           |
    | SimpleHTMLDOM          | 0.109       | 408         |
    | phphtmlparser          | 0.374       | -           |
    | hQuery                 | not support | not support |
    | nokogiri               | not support | not support |
    | zend-dom               | not support | not support |
    +------------------------+-------------+-------------+
    | BeautifulSoup (Python  | 0.234       | -           |
    +------------------------+-------------+-------------+

### Element modification  1000 iteration

    +------------------------+-------------+-------------+
    | Parser                 | Time (sec)  | Memory (kB) |
    +------------------------+-------------+-------------+
    | DOMDocument            | 0.109       | 0           |
    | HTML5DOMDocument       | 0.421       | 2952        |
    | DiDOM                  | 0.422       | 0           |
    | DomCrawler             | 0.484       | 0           |
    | SimpleHTMLDOM          | 1.342       | 3948        |
    | phphtmlparser          | 3.651       | -           |
    | hQuery                 | not support | not support |
    | nokogiri               | not support | not support |
    | zend-dom               | not support | not support |
    +------------------------+-------------+-------------+
    | BeautifulSoup (Python  | 2.231       | -           |
    +------------------------+-------------+-------------+

### Element modification 10000 iteration

    +------------------------+-------------+-------------+
    | Parser                 | Time (sec)  | Memory (kB) |
    +------------------------+-------------+-------------+
    | DOMDocument            | 1.092       | 0           |
    | DiDOM                  | 4.151       | 0           |
    | HTML5DOMDocument       | 4.292       | 747         |
    | DomCrawler             | 4.822       | 0           |
    | SimpleHTMLDOM          | 13.859      | -           |
    | phphtmlparser          | 36.394      | 1178        |
    | hQuery                 | not support | not support |
    | nokogiri               | not support | not support |
    | zend-dom               | not support | not support |
    +------------------------+-------------+-------------+
    | BeautifulSoup (Python  | 22.506      | -           |
    +------------------------+-------------+-------------+
