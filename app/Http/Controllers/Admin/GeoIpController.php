<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Services\Geo\GeoServiceInterface;


class GeoIpController extends Controller
{
    public function index(GeoServiceInterface $reader)
    {
        $ip = request()->ip();
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }
        dd($reader->GetCountry(), $reader->GetIsoCode());
    }
}
