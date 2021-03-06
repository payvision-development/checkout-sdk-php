<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018-2021 Payvision B.V. (https://www.payvision.com/)
 * @license see LICENCE.TXT
 *
 * Warning! This file is auto-generated! Any changes made to this file will be deleted in the future!
 */

namespace Payvision\SDK\Domain\Payments\ValueObject\Cancel;

class ResponseTransaction
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $parentId;

    /**
     * @var string
     */
    private $trackingCode;

    /**
     * @var int
     */
    private $brandId;

    /**
     * @var string
     */
    private $descriptor;

    /**
     * ResponseTransaction constructor.
     *
     * @param string $action
     * @param string $id
     * @param string $parentId
     * @param string $trackingCode
     * @param int $brandId
     * @param string $descriptor
     */
    public function __construct(
        string $action,
        string $id,
        string $parentId,
        string $trackingCode,
        int $brandId = null,
        string $descriptor = null
    ) {
        $this->action = $action;
        $this->id = $id;
        $this->parentId = $parentId;
        $this->trackingCode = $trackingCode;
        $this->brandId = $brandId;
        $this->descriptor = $descriptor;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getParentId(): string
    {
        return $this->parentId;
    }

    /**
     * @return string
     */
    public function getTrackingCode(): string
    {
        return $this->trackingCode;
    }

    /**
     * @return int|null
     */
    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    /**
     * @return string|null
     */
    public function getDescriptor(): ?string
    {
        return $this->descriptor;
    }
}
