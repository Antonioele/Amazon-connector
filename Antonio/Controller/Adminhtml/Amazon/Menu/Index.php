<?php


namespace Aiello1\Antonio\Controller\Adminhtml\Amazon\Menu;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;


class Index extends  Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */

    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
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
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magento_Amazon::channel_amazon_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Amazon Sales Channel Home'));

        return $resultPage;
    }
}