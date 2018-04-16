<?php
namespace Kroschke\Debit\Model\Methods;

use Magento\Quote\Api\Data\PaymentInterface;


class Debit extends \Magento\Payment\Model\Method\AbstractMethod
{
    const METHOD_CODE = 'kroschke_debit';
    const FIELD_IBAN = 'iban';

    /**
     * @var string
     */
    protected $_code = self::METHOD_CODE;

    /**
     * Payment block paths
     *
     * @var string
     */
    protected $_formBlockType = 'Magento\OfflinePayments\Block\Form\Cashondelivery';

    /**
     * Instructions block path
     *
     * @var string
     */
    protected $_infoBlockType = '\Magento\Payment\Block\Info\Cc';


    /**
     * @var bool
     */
    protected $_isGateway = false;

    /**
     * @var bool
     */
    protected $_canOrder = false;

    /**
     * @var bool
     */
    protected $_canAuthorize = true;

    /**
     * @var bool
     */
    protected $_canCapture = true;

    /**
     * @var bool
     */
    protected $_canCapturePartial = false;

    /**
     * @var bool
     */
    protected $_canRefund = false;

    /**
     * @var bool
     */
    protected $_canRefundInvoicePartial = false;

    /**
     * @var bool
     */
    protected $_canVoid = false;

    /**
     * @var bool
     */
    protected $_canUseInternal = false;

    /**
     * @var bool
     */
    protected $_canUseCheckout = true;

    /**
     * @var bool
     */
    protected $_canFetchTransactionInfo = false;

    /**
     * @var bool
     */
    protected $_canReviewPayment = false;

    /**
     * @var string[]
     */
    protected $_supportedCurrencyCodes = ['EUR'];


    public function assignData(\Magento\Framework\DataObject $data)
    {
        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);

        if (!is_array($additionalData)) {
            return $this;
        }

        $data = new \Magento\Framework\DataObject((array)$additionalData);

        $info = $this->getInfoInstance();
        $info->setAdditionalInformation('iban', $data->getData('iban'));
        $info->setAdditionalInformation('debit_country', $data->getData('bank_country'));

        return $this;
    }
}