<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018-2020 Payvision B.V. (https://www.payvision.com/)
 * @license see LICENCE.TXT
 */

namespace Payvision\SDK\Test\Unit\Domain\Service\Builder;

use Payvision\SDK\Domain\Payments\Service\Builder\Payment\Request as PaymentRequestBuilder;
use Payvision\SDK\Domain\Payments\ValueObject\Payment\Request as PaymentRequest;
use Payvision\SDK\Domain\Payments\ValueObject\Payment\RequestBody as PaymentRequestBody;
use Payvision\SDK\Domain\Payments\ValueObject\Payment\RequestTransaction as PaymentRequestTransaction;
use Payvision\SDK\Domain\Payments\ValueObject\Request\Header as PaymentRequestHeader;
use Payvision\SDK\Exception\BuilderException;
use Payvision\SDK\Exception\DataTypeException;
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    /**
     * @var PaymentRequestBuilder
     */
    private $builder;

    protected function setUp()
    {
        $this->builder = new PaymentRequestBuilder();
    }

    public function testValidPaymentObject()
    {
        $paymentObject = $this->builder
            ->setHeader(new PaymentRequestHeader('abc123'))
            ->setBody(
                new PaymentRequestBody(
                    new PaymentRequestTransaction(1.00, 'xxx', 'EUR')
                )
            )
            ->setAction(PaymentRequest::ACTION_PAYMENT)
            ->build();

        self::assertSame(PaymentRequest::ACTION_PAYMENT, $paymentObject->getAction());
    }

    public function testInvalidPaymentObject()
    {
        $this->markTestSkipped('Data validation is not yet implemented in generated builders');
        $this->expectException(DataTypeException::class);
        $this->builder
            ->setAction('Foo')
            ->build();
    }

    public function testMissingParameters()
    {
        $this->markTestSkipped('Data validation is not yet implemented in generated builders');
        $this->expectException(BuilderException::class);
        $this->builder->build();
    }
}
