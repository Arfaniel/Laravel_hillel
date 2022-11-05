<?php

namespace App\Services\UserAgent;

interface UserAgentServiceInterface
{
    public function getBrowser(): ?string;

    public function getOs(): ?string;
}
