<?php
require_once './src/CurrencyConverter.php';
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    public function testConvertUSDToEUR()
    {
        $converter = new CurrencyConverter();
        $this->assertEquals(85, $converter->convert(100, 'USD', 'EUR'));
    }

    public function testSameCurrency()
    {
        $converter = new CurrencyConverter();
        $this->assertEquals(100, $converter->convert(100, 'USD', 'USD'));
    }
}

