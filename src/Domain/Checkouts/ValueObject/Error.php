<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018-2020 Payvision B.V. (https://www.payvision.com/)
 * @license see LICENCE.TXT
 *
 * Warning! This file is auto-generated! Any changes made to this file will be deleted in the future!
 */

namespace Payvision\SDK\Domain\Checkouts\ValueObject;

class Error
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $detailedMessage;

    /**
     * Error constructor.
     *
     * @param int $code
     * @param string $message
     * @param string $detailedMessage
     */
    public function __construct(
        int $code,
        string $message,
        string $detailedMessage = null
    ) {
        $this->code = $code;
        $this->message = $message;
        $this->detailedMessage = $detailedMessage;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string|null
     */
    public function getDetailedMessage()
    {
        return $this->detailedMessage;
    }
}
