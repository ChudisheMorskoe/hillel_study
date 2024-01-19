<?php

namespace App\Strategies;

class SecondFormattingStrategy extends AbstractFormattingStrategy
{
    public function format(string $property, string $value): string
    {
        $propertyWords = explode(' ', $property);
        $formattedProperty = '|' . implode(' ', array_map('strtolower', $propertyWords)) . '|';
        return "$formattedProperty$value|";
    }
}
