<?php

namespace Aiello1\Antonio\Controller\Adminhtml\Amazon\Account;

use  Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Index extends Action
{
    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magento_SalesChannels::channel_amazon');
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        // TODO: Implement execute() method.

        $merchantId = $this->getRequest()->getParam('merchant_id');
        if (!$merchantId) {
            $resultRedirect = $this->resultRedirectFactory->create();

            return $resultRedirect->setPath('channel/amazon/menu_index');
        }
        return $this->getRedirectUrl($merchantId);

    }
    private function getRedirectUrl($merchantId)
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        /** @var string */
        $arguments = [
            'merchant_id' => $merchantId
        ];


    }
}
