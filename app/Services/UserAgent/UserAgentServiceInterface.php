<?php

namespace App\Services\UserAgent;

interface UserAgentServiceInterface
{
    public function GetBrowser(): ?string;

    public function GetOs(): ?string;
}
