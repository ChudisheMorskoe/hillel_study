<?php

namespace App\Strategies;

class FirstFormattingStrategy extends AbstractFormattingStrategy
{
    public function format(string $property, string $value): string
    {
        return "$property: $value";
    }
}
