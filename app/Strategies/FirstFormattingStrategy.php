<?php

namespace App\Strategies;

class FirstFormattingStrategy extends AbstractFormattingStrategy
{
    public function format(array $data): array
    {
        $formattedData = [];

        foreach ($data as $key => $value) {
            $formattedData[] = "$key - $value";
        }

        return $formattedData;
    }
}
