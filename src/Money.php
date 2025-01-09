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

    public function isSameCurrency(self $money): bool
    {
        return $this->currency->equals($money->currency());
    }

    public function compare(self $money): int
    {
        return bccomp($this->amount, $money->amount, $this->currency->getPrecision());
    }

    public function lessThan(self $money): bool
    {
        return -1 === $this->compare($money);
    }

    public function lessThanOrEqual(self $money): bool
    {
        return 0 >= $this->compare($money);
    }

    public function greaterThan(self $money): bool
    {
        return 1 === $this->compare($money);
    }

    public function greaterThanOrEqual(self $money): bool
    {
        return 0 <= $this->compare($money);
    }
}
