<?php

namespace Mike\Cache\Plugin\App;

use Magento\Framework\App\RequestInterface;

class FrontControllerPlugin
{
    private \Mike\Cache\Helper\Customer $customerHelper;

    public function __construct(
        \Mike\Cache\Helper\Customer $customerHelper
    )
    {
        $this->customerHelper = $customerHelper;
    }

    public function beforeDispatch(
        \Magento\Framework\App\FrontController $subject,
        RequestInterface                       $request
    )
    {
        $this->customerHelper->copyPrivateDataToRegistry();
        return [$request];
    }
}
