<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use JMS\Serializer\Annotation\Type;

/**
 * Class Calculation
 * @package CdekSDK2\BaseTypes
 */
class Calculation extends Base
{
    /**
     * Дата планируемой передачи заказа
     * @Type("string")
     * @var string
     */
    public $date;

    /**
     * Тип заказа
     * @Type("int")
     * @var int
     */
    public $type;

    /**
     * Валюта расчета
     * @Type("string")
     * @var string
     */
    public $currency;

    /**
     * Код тарифа
     * @Type("int")
     * @var int
     */
    public $tariff_code;

    /**
     * Адрес отправления
     * @Type("CdekSDK2\BaseTypes\CalculationLocation")
     * @var CalculationLocation
     */
    public $from_location;

    /**
     * Адрес получения
     * @Type("CdekSDK2\BaseTypes\CalculationLocation")
     * @var CalculationLocation
     */
    public $to_location;

    /**
     * Дополнительные услуги
     * @Type("array<CdekSDK2\BaseTypes\Services>")
     * @var Services[]
     */
    public $services;

    /**
     * Список информации по местам
     * @Type("array<CdekSDK2\BaseTypes\CalculationPackage>")
     * @var CalculationPackage[]
     */
    public $packages;

    /**
     * Order constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'tariff_code' => 'required|numeric',
            'services' => 'array',
            'from_location' => [
                'required',
                function ($value) {
                    if ($value instanceof CalculationLocation) {
                        return $value->validate();
                    }
                }
            ],
            'to_location' => [
                'required',
                function ($value) {
                    if ($value instanceof CalculationLocation) {
                        return $value->validate();
                    }
                }
            ],
            'packages' => [
                'required', 'array',
                function ($value) {
                    if (!is_array($value) || empty($value) || count($value) < 1) {
                        return false;
                    }
                    $i = 0;
                    foreach ($value as $item) {
                        if ($item instanceof CalculationPackage) {
                            $i += (int)$item->validate();
                        }
                    }
                    return ($i === count($value));
                }
            ],
        ];
    }
}
