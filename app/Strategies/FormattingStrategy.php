<?php

namespace App\Strategies;

interface FormattingStrategy
{
    public function format(string $property, string $value): string;
}
