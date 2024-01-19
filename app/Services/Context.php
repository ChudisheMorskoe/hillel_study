<?php

namespace App\Services;

use App\Strategies\FormattingStrategy;

class Context
{
    private $strategy;
    private $formattedStrings = [];

    public function __construct(array $objects, FormattingStrategy $strategy)
    {
        $this->strategy = $strategy;

        foreach ($objects as $object) {
            $this->processObject($object);
            $this->formattedStrings[] = "_______";
        }
    }

    private function processObject($object)
    {
        foreach ($object as $property => $value) {
            $formattedString = $this->strategy->format($property, $value);
            $this->formattedStrings[] = $formattedString;
        }
    }

    public function getResult(): array
    {
        $formattedResult = implode("\n", $this->formattedStrings);
        $filename = 'result_' . strtolower(get_class($this->strategy)) . '_' . date('Y-m-d') . '.txt';
        file_put_contents($filename, $formattedResult);

        return [
            'name' => $filename,
            'text' => $formattedResult,
        ];
    }
}
