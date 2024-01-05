<?php

namespace App\Strategies;

class SecondFormattingStrategy extends AbstractFormattingStrategy
{
    public function format(array $data): array
    {
        $formattedData = [];

        foreach ($data as $key => $value) {
            $propertyName = implode(' ', array_map('lcfirst', explode(' ', $key)));
            $formattedData[] = "|$propertyName|$value|";
        }

        return $formattedData;
    }
}
