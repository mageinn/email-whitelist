<?php
namespace Mageinn\EmailWhitelist\Plugin;

use Mageinn\EmailWhitelist\Helper\Data;
use Magento\Email\Model\Transport as Subject;
use Magento\Framework\Registry;

class CheckWhiteListEmailsPlugin
{
    /**
     * @var Registry
     */
    private $registry;
    /**
     * @var Data
     */
    private $helperData;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry,
                                Data $helperData
    )
    {
        $this->helperData = $helperData;
        $this->registry = $registry;
    }

    /**
     * @param Subject $subject
     * @param callable $proceed
     */
    public function aroundSendMessage(Subject $subject, callable $proceed)
    {
        if ($this->helperData->isWhitelistedEmailsEnabled()) {
            $email = $this->registry->registry(Data::REGISTRY_KEY_EMAIL_ADDRESS_TO);
            if (in_array($email, $this->helperData->getWhitelistedEmails())) {
                $proceed();
            }
        }
        else {
            $proceed();
        }
    }
}
