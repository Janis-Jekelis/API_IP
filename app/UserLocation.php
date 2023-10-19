<?php
declare(strict_types=1);

namespace App;
class UserLocation
{
    private string $userLocation;

    public function __construct()
    {
        $ip = json_decode(file_get_contents("https://api.ipify.org?format=json"));
        $geoData = json_decode(file_get_contents("https://ipinfo.io/$ip->ip/geo"));
        $this->userLocation = $geoData->country;
    }

    public function getUserLocation(): string
    {
        return $this->userLocation;
    }
}
