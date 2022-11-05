<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Geo\GeoServiceInterface;


class GeoIpController extends Controller
{
    public function index(GeoServiceInterface $reader)
    {
        $ip = request()->ip();
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }
        $reader->parse($ip);
        dd($reader->getCountry(), $reader->getIsoCode());
    }
}
