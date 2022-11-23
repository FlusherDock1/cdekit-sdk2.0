<?php

/**
 * Copyright (c) 2019. CDEK-IT. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Chizhekov Viktor
 */

namespace CdekSDK2\Tests\Actions;

use CdekSDK2\Actions\Calculations;
use CdekSDK2\BaseTypes\Calculation;
use CdekSDK2\BaseTypes\Location;
use CdekSDK2\BaseTypes\Package;
use CdekSDK2\Client;
use CdekSDK2\Exceptions\RequestException;
use CdekSDK2\Http\ApiResponse;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class CalculationsTest extends TestCase
{
    /**
     * @var Calculations
     */
    protected $calculations;


    protected function setUp()
    {
        parent::setUp();
        $psr18Client = new Psr18Client();
        $client = new Client($psr18Client);
        $client->setTest(true);
        $this->calculations = $client->calculations();
        AnnotationReader::addGlobalIgnoredName('phan');

        /** @phan-suppress-next-line PhanDeprecatedFunction */
        AnnotationRegistry::registerLoader('class_exists');
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->calculations = null;
    }

    /**
     * @throws RequestException
     */
    public function testCalculate()
    {
        /** @var Calculation $calculations */
        $calculations = Calculation::create([
            'tariff_code' => '136',
            'from_location' => Location::create(['code' => 44]),
            'to_location' => Location::create(['code' => 424]),
            'packages' => [Package::create([
                'weight' => 1000,
                'length' => 45,
                'width' => 35,
                'height' => 5,
            ])],
        ]);

        $this->assertTrue($calculations->validate());

        $response = $this->calculations->calculate($calculations);
        $this->assertInstanceOf(ApiResponse::class, $response);

        $this->assertTrue($response->isOk());
        $this->assertFalse($response->hasErrors());
    }
}
