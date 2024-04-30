<?php
declare(strict_types=1);

namespace Value3\Csv\Reader;

use Generator;

interface CsvReaderInterface
{
    /**
     * @param string|resource $filePath
     * @param string $separator
     * @param string $enclosure
     * @return \Generator
     * @throws \Value3\Csv\Exception\InvalidHeaderException
     */
    public function read(mixed $filePath, string $separator = ';', string $enclosure = '"'): Generator;
}
