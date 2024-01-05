<?php

namespace App\Http\Controllers;

use App\Services\Context;
use App\Strategies\FirstFormattingStrategy;
use App\Strategies\SecondFormattingStrategy;
use stdClass;

class CarController extends Controller
{
    public function formatCars(): array
    {
        $carData1 = new stdClass();
        $carData1->brandName = 'Ford';
        $carData1->model = 'Mustang';
        $carData1->modelDetails = 'GT rest 2';
        $carData1->modelYear = 2014;
        $carData1->productionYear = 2013;
        $carData1->color = 'Oxford White';
        $carData1->vinNumber = '243GK13ZX3R298984';


        $carData2 = new stdClass();
        $carData2->brandName = 'BMW';
        $carData2->model = '520i';
        $carData2->modelDetails = 'rest';
        $carData2->modelYear = 2001;
        $carData2->productionYear = 2001;
        $carData2->color = 'Green';
        $carData2->vinNumber = '1GNEK13ZX3R298984';

        $context1 = new Context(new FirstFormattingStrategy());
        $result1 = $context1->executeStrategy([$carData1, $carData2]);

        $context2 = new Context(new SecondFormattingStrategy());
        $result2 = $context2->executeStrategy([$carData1, $carData2]);

        dd([
            'result1' => $result1,
            'result2' => $result2,
        ]);
    }
}
