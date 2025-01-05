<?php

declare(strict_types=1);

namespace Money;

use Money\ISO\ISO4217;

final class Currency
{
    public const USD_CODE = 'USD';
    public const EUR_CODE = 'EUR';
    public const GBP_CODE = 'GBP';
    
    public const USD_EXPONENT = 2;
    public const USD_PRECISION = 4;

    public function __construct(
        private string $code, 
        private int $exponent, 
        private int $precision
        )
    {}

    public function __toString(): string
    {
        return $this->getCode();
    }

    public function getNumericCode(): int
    {
        return (new ISO4217())->byAlphabeticCode($this->code)->numericCode();
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getExponent(): int
    {
        return $this->exponent;
    }

    public function getPrecision(): int
    {
        return $this->precision;
    }

    public function equals(self $other): bool
    {
        return $this->code === $other->getCode() && $this->precision === $other->getPrecision() && $this->exponent === $other->getExponent();
    }
}
