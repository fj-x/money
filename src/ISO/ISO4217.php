<?php

declare(strict_types=1);

namespace Money\ISO;

class ISO4217
{
    private static ?array $rawCurrencies = null;

    /**
     * @var ISOCurrency[]
     */
    private array $currencies = [];

    public function getByAlphabeticCode(string $code): ISOCurrency
    {
        if (array_key_exists($code, $this->getCurrencies())) {
            return $this->create($this->getCurrencies()[$code]);
        }

        throw new \InvalidArgumentException('ISO 4217 does not contains: '. $code);
    }

    public function getByNumericCode(int $code): ISOCurrency
    {
        foreach ($this->getCurrencies() as $currency) {
            if ($code === $currency['numericCode']) {
                return $this->create($currency);
            }
        }

        throw new \InvalidArgumentException('ISO 4217 does not contains: '. $code);
    }

    private function create(array $data): ISOCurrency
    {
        if (false === array_key_exists($data['alphabeticCode'], $this->currencies)) {
            $this->currencies[$data['alphabeticCode']] = new ISOCurrency(
                $data['currency'],
                $data['alphabeticCode'],
                $data['numericCode'],
                $data['minorUnit']
            );
        }

        return $this->currencies[$data['alphabeticCode']];
    }

    private function getCurrencies(): array
    {
        if (null === self::$rawCurrencies) {
            self::$rawCurrencies = $this->load();
        }

        return self::$rawCurrencies;
    }

    private function load(): array
    {
        $file = __DIR__.'/currencies.php';

        if (file_exists($file)) {
            return require $file;
        }

        throw new \RuntimeException('Failed to load currencies.');
    }
}
