<?php

namespace Mike\Cache\Plugin\Http\Context;

class CustomerContextPlugin
{
    private \Magento\Customer\Model\Session $customerSession;
    private \Magento\Framework\App\Http\Context $httpContext;
    private \Magento\Framework\Registry $registry;
    private \Mike\Cache\Helper\Customer $customerHelper;

    public function __construct(
        \Magento\Customer\Model\Session     $customerSession,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Framework\Registry         $registry,
        \Mike\Cache\Helper\Customer         $customerHelper
    )
    {
        $this->customerSession = $customerSession;
        $this->httpContext = $httpContext;
        $this->registry = $registry;
        $this->customerHelper = $customerHelper;
    }

    /**
     * \Magento\Framework\App\Http\Context::getVaryString is used by Magento to retrieve unique identifier for selected context,
     * so this is a best place to declare custom context variables
     */
    function beforeGetVaryString(\Magento\Framework\App\Http\Context $subject)
    {
        $customerId = $this->customerSession->getCustomerId();

        if ($customerId) {
            $this->customerHelper->copyPrivateDataToRegistry();
        } else {
            # Get data from: \Mike\Cache\Plugin\App\FrontControllerPlugin::beforeDispatch
            $customerId = $this->customerHelper->getCustomerIdFromRegistry();
        }


        if (!empty($customerId)) {
            $xxx = $this->customerHelper->getXxxFromRegistry();
            $yyy = $this->customerHelper->getYyyFromRegistry();

            # Only set value to context
//            if (!empty($assortmentIds)) {
//                $subject->setValue('CONTEXT_ASSORTMENT', implode('&', $assortmentIds), 0);
//            }
            
            if (0 && $xxx) {
                $subject->setValue('CONTEXT_XXX', $xxx, 0);
            }
            if (0 && $yyy) {
                $subject->setValue('CONTEXT_YYY', $yyy, 0);
            }
        }
    }
}
