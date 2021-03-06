<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018-2020 Payvision B.V. (https://www.payvision.com/)
 * @license see LICENCE.TXT
 */

namespace Payvision\SDK\Test\Api;

use Payvision\SDK\Infrastructure\ApiConnection;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /**
     * @var ApiConnection
     */
    protected $apiConnection;

    /**
     * @var array
     */
    protected $credentials;

    /**
     * @var bool
     */
    protected $debug = false;

    protected function setUp(): void
    {
        $envFile = __DIR__ . '/../../../.env.php';
        if (!\file_exists($envFile)) {
            $this->fail(".env.php not found. Please create one in order to run the API tests");
        }
        $this->credentials = include $envFile;
        $this->apiConnection = new ApiConnection(
            $this->credentials['username'],
            $this->credentials['password'],
            ApiConnection::URI_TEST,
            $this->debug
        );
    }

    protected function generateTrackingCode(): string
    {
        return 'test.' . \microtime(true) . '.' . \rand(100000, 999999);
    }
}
