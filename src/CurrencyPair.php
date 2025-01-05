<?php

declare(strict_types=1);

namespace Money;

final class CurrencyPair
{
    public readonly Currency $fromCurrency;

    public readonly Currency $toCurrency;

    public readonly string $exchangeRate;

    public function __construct(Currency $fromCurrency, Currency $toCurrency, string $exchangeRate)
    {
        // TODO: Check if currencies are equal and rate is numeric  

        $this->fromCurrency = $fromCurrency;
        $this->toCurrency = $toCurrency;
        $this->exchangeRate = $exchangeRate;
    }

    public function equals(self $other): bool
    {
        return $this->fromCurrency->equals($other->fromCurrency) 
        && $this->toCurrency->equals($other->toCurrency) 
        && $this->exchangeRate === $other->exchangeRate;
    }
}
