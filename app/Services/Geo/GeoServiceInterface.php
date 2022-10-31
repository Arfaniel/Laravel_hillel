<?php

namespace App\Services\Geo;

interface GeoServiceInterface
{
    public function GetIsoCode(): ?string;

    public function GetCountry(): ?string;

    public function parse(string $ip): void;
}
