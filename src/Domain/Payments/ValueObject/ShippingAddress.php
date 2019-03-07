<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018-2019 Payvision B.V. (https://www.payvision.com/)
 * @license see LICENCE.TXT
 *
 * Warning! This file is auto-generated! Any changes made to this file will be deleted in the future!
 */

namespace Payvision\SDK\Domain\Payments\ValueObject;

class ShippingAddress
{
    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $houseNumber;

    /**
     * @var string
     */
    private $houseNumberSuffix;

    /**
     * @var string
     */
    private $stateCode;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $streetInfo;

    /**
     * @var string
     */
    private $zip;

    /**
     * ShippingAddress constructor.
     *
     * @param string $city
     * @param string $countryCode
     * @param string $houseNumber
     * @param string $houseNumberSuffix
     * @param string $stateCode
     * @param string $street
     * @param string $streetInfo
     * @param string $zip
     */
    public function __construct(
        string $city = null,
        string $countryCode = null,
        string $houseNumber = null,
        string $houseNumberSuffix = null,
        string $stateCode = null,
        string $street = null,
        string $streetInfo = null,
        string $zip = null
    ) {
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->houseNumber = $houseNumber;
        $this->houseNumberSuffix = $houseNumberSuffix;
        $this->stateCode = $stateCode;
        $this->street = $street;
        $this->streetInfo = $streetInfo;
        $this->zip = $zip;
    }

    /**
    * @return string|null
    */
    public function getCity()
    {
        return $this->city;
    }

    /**
    * @return string|null
    */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
    * @return string|null
    */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
    * @return string|null
    */
    public function getHouseNumberSuffix()
    {
        return $this->houseNumberSuffix;
    }

    /**
    * @return string|null
    */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
    * @return string|null
    */
    public function getStreet()
    {
        return $this->street;
    }

    /**
    * @return string|null
    */
    public function getStreetInfo()
    {
        return $this->streetInfo;
    }

    /**
    * @return string|null
    */
    public function getZip()
    {
        return $this->zip;
    }
}