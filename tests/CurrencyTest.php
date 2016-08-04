<?php
/**
 * Currency test.
 */
namespace Payu\Test;

use Payu\Component\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider goodCurrencyProvider
     */
    public function testGoodCurrencyCodeWorks($code, $expected)
    {
        $cur = (string) new Currency($code);

        $this->assertEquals($cur, $expected);
    }

    public function goodCurrencyProvider()
    {
        return [
          ['TRY', 'TRY'],
          ['EUR', 'EUR'],
          ['GBP', 'GBP'],
          ['USD', 'USD'],
          // Lowercase
          ['usd', 'USD'],
          ['gbp', 'GBP'],
          ['eur', 'EUR'],
          ['try', 'TRY'],
        ];
    }
}
