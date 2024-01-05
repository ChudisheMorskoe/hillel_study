<?php

namespace App\Strategies;

interface FormattingStrategyInterface
{
    public function format(array $data): array;
}
