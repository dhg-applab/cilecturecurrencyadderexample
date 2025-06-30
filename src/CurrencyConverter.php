<?php

class CurrencyConverter
{
    private $exchangeRates;

    public function __construct()
    {
        // Intentional bug: Incorrect USD to EUR conversion rate
        $this->exchangeRates = [
            'USD' => ['EUR' => 0.85], // Incorrect rate (should be 0.85)
            'EUR' => ['USD' => 1.18],
        ];
    }

    public function convert($amount, $fromCurrency, $toCurrency)
    {
        if ($fromCurrency === $toCurrency) {
            return $amount;
        }

        if (!isset($this->exchangeRates[$fromCurrency][$toCurrency])) {
            throw new Exception("Conversion rate from $fromCurrency to $toCurrency not available.");
        }

        return $amount * $this->exchangeRates[$toCurrency][$fromCurrency];
    }
}

