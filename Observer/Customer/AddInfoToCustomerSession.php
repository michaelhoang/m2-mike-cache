<?php

namespace Mike\Cache\Observer\Customer;
class AddInfoToCustomerSession implements \Magento\Framework\Event\ObserverInterface
{
    private \Magento\Customer\Model\Session $customerSession;
    private \Mike\Cache\Helper\Customer $customerHelper;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Mike\Cache\Helper\Customer     $customerHelper
    )
    {
        $this->customerSession = $customerSession;
        $this->customerHelper = $customerHelper;
    }

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    )
    {
        //Your observer code
        /** @var \Magento\Customer\Model\Customer $customer */
        $customer = $observer->getCustomer();

        # Check condition
        if (1) {
            $this->customerSession->setData(\Mike\Cache\Model\Customer\Context::CONTEXT_XXX, 'xxx_value');
            $this->customerSession->setData(\Mike\Cache\Model\Customer\Context::CONTEXT_YYY, 'yyy_value');
        }
    }
}
