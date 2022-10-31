<?php

namespace App\Services\UserAgent;

use WhichBrowser\Parser;

class WhichBrowserService implements UserAgentServiceInterface
{

    protected $_data;

    /**
     * @var Parser
     */
    public function __construct()
    {
        $this->_data = new Parser($_SERVER['HTTP_USER_AGENT']);
    }

    /**
     * @return string|null
     */
    public function GetOs(): ?string
    {
        return $this->_data->os->toString();
    }

    /**
     * @return string|null
     */
    public function GetBrowser(): ?string
    {
        return $this->_data->browser->toString();
    }
}
