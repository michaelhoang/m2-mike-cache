<?php

namespace Mike\Cache\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Customer extends AbstractHelper
{
    protected \Magento\Customer\Model\Session $customerSession;
    private \Magento\Framework\Registry $registry;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Customer\Model\Session       $customerSession,
        \Magento\Framework\Registry           $registry
    )
    {
        parent::__construct($context);
        $this->customerSession = $customerSession;
        $this->registry = $registry;
    }

    public function copyPrivateDataToRegistry()
    {
        # customer_id
        $this->addCustomerIdToRegistry($this->customerSession->getCustomerId());

        # xxx
        $this->addXxxToRegistry($this->customerSession->getData(\Mike\Cache\Model\Customer\Context::CONTEXT_XXX));

        # yyy
        $this->addYyyToRegistry($this->customerSession->getData(\Mike\Cache\Model\Customer\Context::CONTEXT_YYY));
    }

    public function addDataToRegistry($key, $value)
    {
        if (!$this->registry->registry($key)) {
            $this->registry->register($key, $value, true);
        }
    }

    public function addCustomerIdToRegistry($customerId)
    {
        $this->addDataToRegistry(\Mike\Cache\Model\Customer\Context::CONTEXT_CUSTOMER_ID, $customerId);
    }

    public function addXxxToRegistry($xxxValue)
    {
        $this->addDataToRegistry(\Mike\Cache\Model\Customer\Context::CONTEXT_XXX, $xxxValue);
    }

    public function addYyyToRegistry($yyyValue)
    {
        $this->addDataToRegistry(\Mike\Cache\Model\Customer\Context::CONTEXT_YYY, $yyyValue);
    }

    public function getCustomerIdFromRegistry()
    {
        return $this->registry->registry(\Mike\Cache\Model\Customer\Context::CONTEXT_CUSTOMER_ID);
    }

    public function getXxxFromRegistry()
    {
        return $this->registry->registry(\Mike\Cache\Model\Customer\Context::CONTEXT_XXX);
    }

    public function getYyyFromRegistry()
    {
        return $this->registry->registry(\Mike\Cache\Model\Customer\Context::CONTEXT_YYY);
    }
}

