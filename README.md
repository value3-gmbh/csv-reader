# PHP library to read large CSV files 
The repository has not other dependencies. It uses PHP Generators to process large files with excessive memory usage. 

Full documentation on https://www.value3.de/note/php-lib-for-terabyte-lage-csv-files 

```
composer require value3/csv-reader
```

```php
<?php
    
use Value3\CsvReader\CsvReader;

$reader = new CsvReader();

foreach ($reader->read('path/some-file.csv') as $row) {
   echo $row['name'] . PHP_EOL;
   echo $row['last_name'] . PHP_EOL;
}

//working with streams

$fp = fopen('path/some-file.csv', 'r+');

foreach ($reader->read($fp) as $row) {
   echo $row['name'] . PHP_EOL;
   echo $row['last_name'] . PHP_EOL;
}

```
