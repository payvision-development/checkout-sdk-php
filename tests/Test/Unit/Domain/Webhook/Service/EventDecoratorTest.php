<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018-2020 Payvision B.V. (https://www.payvision.com/)
 * @license see LICENCE.TXT
 */

namespace Payvision\SDK\Test\Unit\Domain\Webhook\Service;

use Payvision\SDK\Domain\Payments\ValueObject\Cancel\Response as CancelResponse;
use Payvision\SDK\Domain\Payments\ValueObject\Capture\Response as CaptureResponse;
use Payvision\SDK\Domain\Payments\ValueObject\Payment\Response as PaymentResponse;
use Payvision\SDK\Domain\Payments\ValueObject\Refund\Response as RefundResponse;
use Payvision\SDK\Domain\Webhook\Service\EventDecorator;
use Payvision\SDK\Domain\Webhook\ValueObject\Event;
use Payvision\SDK\Exception\WebhookException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class EventDecoratorTest extends TestCase
{
    /**
     * @var EventDecorator
     */
    private $subject;

    /**
     * @var Event|MockObject
     */
    private $mockedEvent;

    protected function setUp(): void
    {
        $this->mockedEvent = $this->getMockBuilder(Event::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->subject = new EventDecorator($this->mockedEvent);
    }

    /**
     * @param string $payloadClassName
     * @param string $expectedType
     * @throws WebhookException
     * @dataProvider payloadDataProvider
     */
    public function testEventTypeShouldBeCorrect(string $payloadClassName, string $expectedType): void
    {
        $this->mockedEvent->method('getPayload')
            ->willReturn(
                $this->getMockBuilder($payloadClassName)
                    ->disableOriginalConstructor()
                    ->getMock()
            );

        self::assertSame($expectedType, $this->subject->getPayloadType());
    }

    /**
     * @throws WebhookException
     */
    public function testUnkownPayloadShouldThrowException(): void
    {
        $this->mockedEvent->method('getPayload')
            ->willReturn(
                $this->getMockBuilder('Foo')
                    ->disableOriginalConstructor()
                    ->getMock()
            );

        $this->expectException(WebhookException::class);
        $this->expectExceptionCode(WebhookException::UNKNOWN_PAYLOAD);
        $this->subject->getPayloadType();
    }

    //phpcs:disable ObjectCalisthenics.Files.FunctionLength.ObjectCalisthenics\Sniffs\Files\FunctionLengthSniff

    /**
     * @param string $payloadClassName
     * @param string $validType
     * @throws WebhookException
     * @dataProvider payloadDataProvider
     */
    public function testExceptionShouldBeThrownForIncorrectPayload(string $payloadClassName, string $validType): void
    {
        $this->mockedEvent->method('getPayload')
            ->willReturn(
                $this->getMockBuilder($payloadClassName)
                    ->disableOriginalConstructor()
                    ->getMock()
            );

        $types = [
            EventDecorator::TYPE_CANCEL,
            EventDecorator::TYPE_CAPTURE,
            EventDecorator::TYPE_REFUND,
            EventDecorator::TYPE_PAYMENT,
        ];

        foreach ($types as $type) {
            if ($type !== $validType) {
                $this->expectException(WebhookException::class);
                $this->expectExceptionCode(WebhookException::UNEXPECTED_PAYLOAD);
            }

            switch ($type) {
                case EventDecorator::TYPE_CANCEL:
                    $this->subject->getCancelResponse();
                    break;
                case EventDecorator::TYPE_CAPTURE:
                    $this->subject->getCaptureResponse();
                    break;
                case EventDecorator::TYPE_REFUND:
                    $this->subject->getRefundResponse();
                    break;
                case EventDecorator::TYPE_PAYMENT:
                    $this->subject->getPaymentResponse();
                    break;
            }
        }
    }

    //phpcs:enable ObjectCalisthenics.Files.FunctionLength.ObjectCalisthenics\Sniffs\Files\FunctionLengthSniff

    public function payloadDataProvider(): array
    {
        return [
            [CancelResponse::class, EventDecorator::TYPE_CANCEL],
            [CaptureResponse::class, EventDecorator::TYPE_CAPTURE],
            [RefundResponse::class, EventDecorator::TYPE_REFUND],
            [PaymentResponse::class, EventDecorator::TYPE_PAYMENT],
        ];
    }
}
