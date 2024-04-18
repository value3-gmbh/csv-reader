# PHP library to read large CSV files 
The repository has not other dependencies. 

```php
<?php
    
use Value3\Csv\Reader\CsvReader;

$reader = new CsvReader();

foreach ($reader->read('path/some-file.csv') as $row) {
   echo $row['name'] . PHP_EOL;
   echo $row['last_name'] . PHP_EOL;
}

```
