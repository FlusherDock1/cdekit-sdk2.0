<?php

declare(strict_types=1);

namespace CdekSDK2\BaseTypes;

use JMS\Serializer\Annotation\Type;

/**
 * Class CalculationLocation
 * @package CdekSDK2\BaseTypes
 */
class CalculationLocation extends Base
{
    /**
     * Код локации из справочника СДЭК
     * @Type("int")
     * @var int
     */
    public $code;

    /**
     * Почтовый индекс
     * @Type("string")
     * @var string
     */
    public $postal_code;

    /**
     * Долгота
     * @Type("float")
     * @var float
     */
    public $longitude;

    /**
     * Широта
     * @Type("float")
     * @var float
     */
    public $latitude;

    /**
     * Код страны в формате  ISO_3166-1_alpha-2
     * @example RU, DE, TR
     * @Type("string")
     * @var string
     */
    public $country_code;

    /**
     * Название региона
     * @Type("string")
     * @var string
     */
    public $region;

    /**
     * Код региона (справочник СДЭК)
     * @Type("int")
     * @var int
     */
    public $region_code;

    /**
     * Название города
     * @Type("string")
     * @var string
     */
    public $city;

    /**
     * Строка адреса
     * @Type("string")
     * @var string
     */
    public $address;


    /**
     * CalculationLocation constructor.
     * @param array $param
     */
    public function __construct(array $param = [])
    {
        parent::__construct($param);
        $this->rules = [
            'code' => 'numeric',
            'country_code' => 'alpha:2',
            'city' => 'alpha',
        ];
    }
}
