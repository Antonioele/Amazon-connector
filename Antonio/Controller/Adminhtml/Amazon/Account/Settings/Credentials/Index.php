<?php


namespace Aiello1\Antonio\Controller\Adminhtml\Amazon\Account\Settings\Credentials;
use Aiello1\Antonio\Model\Amazon\Definitions;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $resultPageFactory;
    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory

    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;

    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magento_SalesChannels::channel_amazon');
    }
    public function execute()
    {
        // TODO: Implement execute() method.
        $title = __('Setup Amazon Store');
        /** @var \Magento\Framework\View\Result\Page */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Aiello1_Antonio::channel_amazon_menu');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;

    }
}