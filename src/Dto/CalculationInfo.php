<?php

declare(strict_types=1);

namespace CdekSDK2\Dto;

use CdekSDK2\BaseTypes\Contact;
use CdekSDK2\BaseTypes\Location;
use CdekSDK2\BaseTypes\Money;
use CdekSDK2\BaseTypes\Package;
use CdekSDK2\BaseTypes\Seller;
use CdekSDK2\BaseTypes\Services;
use CdekSDK2\BaseTypes\Threshold;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;

/**
 * Class Calculation
 * @package CdekSDK2\Dto
 */
class CalculationInfo
{
    /**
     * Стоимость услуги доставки
     * @Type("float")
     * @var float
     */
    public $delivery_sum;

    /**
     * Минимальное время доставки (в рабочих днях)
     * @Type("int")
     * @var int
     */
    public $period_min;

    /**
     * Максимальное время доставки (в рабочих днях)
     * @Type("int")
     * @var int
     */
    public $period_max;

    /**
     * Расчетный вес (в граммах)
     * @Type("int")
     * @var int
     */
    public $weight_calc;

    /**
     * Минимальное время доставки (в календарных днях)
     * @Type("int")
     * @var int
     */
    public $calendar_min;

    /**
     * Максимальное время доставки (в календарных днях)
     * @Type("int")
     * @var int
     */
    public $calendar_max;

    /**
     * Дополнительные услуги
     * @Type("array<CdekSDK2\BaseTypes\Services>")
     * @var Services[]
     */
    public $services;

    /**
     * Валюта расчета
     * @Type("string")
     * @var string
     */
    public $currency;
}
