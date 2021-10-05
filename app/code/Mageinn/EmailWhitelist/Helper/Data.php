<?php

namespace Mageinn\EmailWhitelist\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const REGISTRY_KEY_EMAIL_ADDRESS_TO = 'email_address_to';

    const XML_PATH_EMAILWHITELIST_GENERAL_WHITELIST_EMAIL = 'mageinn_emailwhitelist/general/whitelist_email';

     const XML_PATH_EMAILWHITELIST_GENERAL_ENABLE = 'mageinn_emailwhitelist/general/enable';
    /**
     * @return array
     */
    public function getWhitelistedEmails(): array
    {
        $emails = $this->scopeConfig->getValue(self::XML_PATH_EMAILWHITELIST_GENERAL_WHITELIST_EMAIL);

        return preg_split('/\r\n|\r|\n/', $emails);
    }
    public function isWhitelistedEmailsEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_EMAILWHITELIST_GENERAL_ENABLE);
    }
}


