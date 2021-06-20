<?php
/**
 * @package   Igor_PrintButton
 * @version   1.0.0
 * @author    Igor Persona
 */
declare(strict_types=1);

namespace Igor\PrintButton\Plugin\Block\Widget\Button;

use Magento\Framework\View\Element\AbstractBlock;
use Magento\Backend\Block\Widget\Button\ButtonList;
use Magento\Backend\Block\Widget\Button\Toolbar;

/**
 * Class ToolbarPlugin
 * @package Igor\PrintButton\Plugin\Block\Adminhtml\Order\Invoice
 */
class ToolbarPlugin {

    /**
     * @param Toolbar $subject
     * @param AbstractBlock $context
     * @param ButtonList $buttonList
     * @return array
     */
    public function beforePushButtons(
        Toolbar $subject,
        AbstractBlock $context,
        ButtonList $buttonList
    ): array {
        if ('sales_invoice_view' !== $context->getNameInLayout()) {
            return [$context, $buttonList];
        }
        $invoiceId = $context->getRequest()->getParam('invoice_id');
        $printButtonUrl = $context->getUrl('igor/invoice/printinvoice', ['invoice_id' => $invoiceId]);
        $buttonList->add(
            'print_invoice_button',
            [
                'label' => __('Print2'),
                'on_click' => 'setLocation(\'' . $printButtonUrl . '\')',
                'class' => 'btn-print2-invoice',
                'id' => 'print2_invoice_button'
            ]
        );
        return [$context, $buttonList];
    }
}
