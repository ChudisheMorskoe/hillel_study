<?php

namespace App\Strategies;

abstract class AbstractFormattingStrategy implements FormattingStrategyInterface
{
    public abstract function format(array $data): array;
}
