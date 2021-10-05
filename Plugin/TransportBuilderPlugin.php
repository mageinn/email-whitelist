<?php
namespace Mageinn\EmailWhitelist\Plugin;

use Mageinn\EmailWhitelist\Helper\Data;
use Magento\Framework\Mail\Template\TransportBuilder as Subject;
use Magento\Framework\Registry;

class TransportBuilderPlugin
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param Subject $subject
     * @param $address
     */
    public function beforeAddTo(Subject $subject, $address)
    {
        $this->registry->register(Data::REGISTRY_KEY_EMAIL_ADDRESS_TO, $address);
    }
}
