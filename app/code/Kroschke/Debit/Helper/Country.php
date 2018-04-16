<?php
namespace Kroschke\Debit\Helper;


class Country extends Base
{
    private $country;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Directory\Model\Country $country
    ) {
        parent::__construct($context, $storeManager);
        $this->country = $country;
    }

    /**
     * Get all activated debit SEPA countries
     *
     * @return array
     */
    public function getDebitSepaCountries()
    {
        $aReturn = [];

        $sCountries = $this->getConfigParam('sepa_country');
        if ($sCountries) {
            $aCountries = explode(',', $sCountries);
            foreach ($aCountries as $sCountryCode) {
                $sCountryName = $this->getCountryNameByIso2($sCountryCode);
                if ($sCountryName) {
                    $aReturn[] = [
                        'id' => $sCountryCode,
                        'title' => $sCountryName,
                    ];
                }
            }
        }
        return $aReturn;
    }

    public function getCountryNameByIso2($sCountryCode)
    {
        $oCountry = $this->country->loadByCode($sCountryCode);
        if ($oCountry) {
            return $oCountry->getName();
        }
        return false;
    }

}