<?php
declare(strict_types=1);
namespace App;
use PragmaRX\Countries\Package\Countries;
class CountryInfo
{

    private string $name;
    private string $capital;
    private array $currencies;
    private array $languages;
    private string $timeZone;

    public function __construct()
    {
        $country=new Countries();
        $userLoc=(new UserLocation())->getUserLocation();
        $this->name=$country->where('cca2',$userLoc)->first()->brk_name;
        $this->capital=$country->where('cca2',$userLoc)->first()->capital[0];
        foreach ($country->where('cca2',$userLoc)->first()->currencies as $currency) {
            $this->currencies[] = $currency;
        }
        foreach ($country->where('cca2',$userLoc)->first()->languages as $language) {
            $this->languages[] = $language;
        }
        $this->timeZone=$country->where('cca2',$userLoc)->first()->hydrate('timezones')->timezones->first()->zone_name;

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCapital(): string
    {
        return $this->capital;
    }
    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function getTimeZone(): string
    {
        return $this->timeZone;
    }
}
