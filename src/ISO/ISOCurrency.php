<?php

declare(strict_types=1);

namespace Money\ISO;

class ISOCurrency
{
    public function __construct(
        public readonly string $name,
        public readonly string $alphabeticCode,
        public readonly int $numericCode,
        public readonly int $minorUnit
    )
    {}
}
