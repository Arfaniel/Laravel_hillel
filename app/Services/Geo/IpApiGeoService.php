<?php

namespace App\Services\Geo;


use Illuminate\Support\Facades\Http;

class IpApiGeoService implements GeoServiceInterface
{

    /** @var array */
    protected $_data;

    /**
     * @param string $ip
     * @return void
     */
    public function parse(string $ip): void
    {
        $response = Http::get($this->getUrl($ip));
        $this->_data = $response->json();
    }

    /**
     * @param string $ip
     * @return string
     */
    protected function getUrl(string $ip): string
    {
        $url = 'http://ip-api.com/json/' . $ip;
        $parameters = http_build_query([
            'fields' => 'continentCode,countryCode,query'
        ]);
        return $url . '?' . $parameters;
    }

    /**
     * @return string|null
     */
    public function GetIsoCode(): ?string
    {
        return $this->_data['continentCode'] ?? null;
    }

    /**
     * @return string|null
     */
    public function GetCountry(): ?string
    {
        return $this->_data['countryCode'] ?? null;
    }
}
