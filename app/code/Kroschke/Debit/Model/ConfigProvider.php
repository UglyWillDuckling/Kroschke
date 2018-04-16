<?php
namespace Kroschke\Debit\Model;

use Magento\Framework\Escaper;
use Magento\OfflinePayments\Model\InstructionsConfigProvider as OfflinePaymentsInstructionsConfigProvider;
use Magento\Payment\Helper\Data as PaymentHelper;
use Kroschke\Debit\Model\Methods\Debit;


class ConfigProvider extends OfflinePaymentsInstructionsConfigProvider
{
    /**
     * @var \Kroschke\Debit\Helper\Country
     */
    private $country;

    protected $methodCodes = [Debit::METHOD_CODE];


    public function __construct(
        PaymentHelper $paymentHelper,
        Escaper $escaper,
        \Kroschke\Debit\Helper\Country $country
    ) {
        parent::__construct($paymentHelper, $escaper);
        $this->country = $country;
    }

    public function getConfig()
    {
        $config = [];
        $code = Debit::METHOD_CODE;

        if ($this->methods[$code]->isAvailable()) {
            $config = [
                'payment' => [
                    $code => [
                        'instructions'   => $this->country->getConfigParam('instructions'),
                        'sepaCountries' => $this->country->getDebitSepaCountries(),
                    ]
                ]
            ];
        }
        return $config;
    }
}