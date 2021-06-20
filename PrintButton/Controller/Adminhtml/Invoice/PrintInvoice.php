<?php
/**
 * @package   Igor_PrintButton
 * @version   1.0.0
 * @author    Igor Persona
 */
declare(strict_types=1);

namespace Igor\PrintButton\Controller\Adminhtml\Invoice;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class PrintInvoice
 * @package Igor\PrintButton\Controller\Adminhtml\Invoice
 */
class PrintInvoice implements HttpGetActionInterface {

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * PrintInvoice constructor.
     * @param RequestInterface $request
     * @param ResultFactory $resultFactory
     */
    public function __construct(RequestInterface $request, ResultFactory $resultFactory)
    {
        $this->request = $request;
        $this->resultFactory = $resultFactory;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest() : RequestInterface
    {
        return $this->request;
    }

    /**
     * @return ResultInterface
     */
    public function execute() : ResultInterface
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath("sales/invoice/index");
        return $resultRedirect;
    }
}
