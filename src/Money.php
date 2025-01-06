<?php

declare(strict_types=1);

namespace Money;

final class Money
{
    public const MAX = '999999999999.99999999';

    private string $amount;

    private Currency $currency;

    public function __construct(string $amount, Currency $currency)
    {
        // TODO: check if amount is numeric
        $this->amount = $amount;
        $this->currency = $currency;
    }

    private function __clone()
    {
    }

    public function amount(): string
    {
        return $this->amount;
    }

    public function currency(): Currency
    {
        return $this->currency;
    }

    public function currencyCode(): string
    {
        return $this->currency->getCode();
    }

    public function currencyNumericCode(): int
    {
        return $this->currency->getNumericCode();
    }

    public function isSameCurrency(self $other): bool
    {
        return $this->currency->equals($other->currency());
    }
}
