<?php

declare(strict_types=1);

namespace Value3\CsvReader;

use Generator;
use Value3\Csv\Exception\InvalidHeaderException;

class CsvReader implements CsvReaderInterface
{

    /**
     * @inheritDoc
     */
    public function read(mixed $filePath, string $separator = ';', string $enclosure = '"'): Generator
    {
        if(is_resource($filePath)) {
            $handle = $filePath;
        } else  {
            $handle = fopen($filePath, 'rb');
        }

        $header = fgetcsv($handle, 4096, $separator, $enclosure);

        $this->assertHeaderValueNotEmpty($header);

        while (!feof($handle)) {
            $line = fgetcsv($handle, 4096, $separator, $enclosure);
            yield $this->buildRow($header, (array)$line);
        }

        fclose($handle);
    }

    /**
     * @param array $header
     * @param array $row
     * @return array
     */
    protected function buildRow(array $header, array $row): array
    {
        $newRow = [];
        foreach ($header as $k => $name) {
            if (isset($row[$k])) {
                $newRow[$name] = $row[$k];
            } else {
                $newRow[$name] = null;
            }
        }

        return $newRow;
    }

    /**
     * @param array $header
     * @return void
     * @throws InvalidHeaderException
     */
    protected function assertHeaderValueNotEmpty(array $header): void
    {
        if (empty($header)) {
            throw new InvalidHeaderException('Unable to read the first line');
        }

        foreach ($header as $k => $value) {
            if (empty($value)) {
                throw new InvalidHeaderException(
                    sprintf('Empty header value found at %s', $k)
                );
            }
        }
    }
}
