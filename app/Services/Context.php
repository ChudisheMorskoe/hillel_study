<?php
namespace App\Services;

use App\Strategies\AbstractFormattingStrategy;

class Context
{
    private AbstractFormattingStrategy $strategy;

    public function __construct(AbstractFormattingStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy(array $objects): array
    {
        $formattedData = [];

        foreach ($objects as $object) {
            $formattedData[] = $this->strategy->format((array)$object);
        }

        return $formattedData;
    }
}
