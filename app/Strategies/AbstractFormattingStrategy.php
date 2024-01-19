<?php

namespace App\Strategies;

abstract class AbstractFormattingStrategy implements FormattingStrategy
{
    abstract public function format(string $property, string $value): string;
}
