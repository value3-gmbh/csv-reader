# PHP library to read large CSV files 
The repository has not other dependencies. 

```
composer require value3/csv-reader
```

```php
<?php
    
use Value3\Csv\Reader\CsvReader;

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
