<?php
require_once './src/MoneyAdder.php';
use PHPUnit\Framework\TestCase;

class MoneyAdderTest extends TestCase
{
    public function testAddUSDAndEUR()
    {
        $adder = new MoneyAdder();
        $result = $adder->add(100, 'USD', 85, 'EUR', 'USD');
        $this->assertEquals(200.3, round($result, 2));
    }
}

