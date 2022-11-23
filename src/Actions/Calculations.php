<?php

declare(strict_types=1);

namespace CdekSDK2\Actions;

use CdekSDK2\BaseTypes\Calculation;
use CdekSDK2\Exceptions\RequestException;
use CdekSDK2\Http\ApiResponse;

/**
 * Class Barcodes
 * @package CdekSDK2\Actions
 */
class Calculations extends Action
{
    /**
     * URL для запросов к API на расчет
     * @var string
     */
    public const URL = '/calculator/tariff';

    /**
     * Создание заказа
     * @param Calculation $calculation
     * @return ApiResponse
     * @throws RequestException
     */
    public function calculate(Calculation $calculation): ApiResponse
    {
        $params = $this->serializer->toArray($calculation);
        return $this->preparedAdd($params);
    }
}
