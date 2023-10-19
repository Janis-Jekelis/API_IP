<?php
declare(strict_types=1);
namespace App;
class Application
{
    public static function run():void
    {
        $countryInfo=new CountryInfo();
        echo "Name: " . $countryInfo->getName() . PHP_EOL;
        echo "Capital: " . $countryInfo->getCapital() . PHP_EOL;
        foreach ($countryInfo->getCurrencies() as $currency) {
            echo "Currency: " . $currency . PHP_EOL;
        }
        foreach ($countryInfo->getLanguages() as $language) {
            echo "Language: " . $language . PHP_EOL;
        }
        echo "Time zone: " . $countryInfo->getTimeZone() . PHP_EOL;
    }
}
