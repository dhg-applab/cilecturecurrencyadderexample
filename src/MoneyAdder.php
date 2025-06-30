<?php

require_once 'CurrencyConverter.php';

class MoneyAdder
{
    private $converter;

    public function __construct()
    {
        $this->converter = new CurrencyConverter();
    }

    public function add($amount1, $currency1, $amount2, $currency2, $targetCurrency)
    {
        $convertedAmount1 = $this->converter->convert($amount1, $currency1, $targetCurrency);
        $convertedAmount2 = $this->converter->convert($amount2, $currency2, $targetCurrency);

        return $convertedAmount1 + $convertedAmount2;
    }
}
