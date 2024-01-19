<?php

use App\Services\Context;
use App\Strategies\FirstFormattingStrategy;
use App\Strategies\SecondFormattingStrategy;

require __DIR__ . '/vendor/autoload.php';

$object1 = (object)[
    'brandName' => 'Ford',
    'model' => 'Mustang',
    'modelDetails' => 'GT rest 2',
    'modelYear' => '2014',
    'productionYear' => '2013',
    'color' => 'Oxford White',
];

$object2 = (object)[
    'brandName' => 'BMW',
    'model' => '520i',
    'modelDetails' => 'rest',
    'modelYear' => '2001',
    'productionYear' => '2001',
    'color' => 'Green',
];
$object3 = (object)[
    'brandName' => 'Mazda',
    'model' => 'Mx5',
    'modelDetails' => 'Rf',
    'modelYear' => '2024',
    'productionYear' => '1989',
    'color' => 'Red',
];
$object4 = (object)[
    'brandName' => 'Nissan',
    'model' => 'Skyline',
    'modelDetails' => 'Gtr',
    'modelYear' => '1990',
    'productionYear' => '1957',
    'color' => 'Black',
];

$context1 = new Context([$object1, $object2, $object3, $object4], new FirstFormattingStrategy());
$result1 = $context1->getResult();
file_put_contents($result1['name'], $result1['text']);


$context2 = new Context([$object1, $object2, $object3, $object4], new SecondFormattingStrategy());
$result2 = $context2->getResult();
file_put_contents($result2['name'], $result2['text']);

dd($result1, $result2);
