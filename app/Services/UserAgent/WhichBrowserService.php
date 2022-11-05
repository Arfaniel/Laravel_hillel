<?php

namespace App\Services\UserAgent;

use WhichBrowser\Parser;

class WhichBrowserService implements UserAgentServiceInterface
{

    protected $_data;

    /**
     * @var Parser
     */
    public function __construct($userAgentString)
    {
        $this->_data = new Parser($userAgentString);
    }

    /**
     * @return string|null
     */
    public function getOs(): ?string
    {
        return $this->_data->os->toString();
    }

    /**
     * @return string|null
     */
    public function getBrowser(): ?string
    {
        return $this->_data->browser->toString();
    }
}
