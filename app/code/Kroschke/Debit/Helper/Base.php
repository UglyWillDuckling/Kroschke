<?php

namespace Kroschke\Debit\Helper;

use Magento\Store\Model\ScopeInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;
/**
 * Helper base class
 */
class Base extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Store manager object
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context      $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    /**
     * Helper method to get parameter from the config
     * divided by the config path elements
     *
     * @param  string $sKey
     * @param  string $sGroup
     * @param  string $sSection
     * @param  string $sStoreCode
     * @return string
     */
    public function getConfigParam($sKey, $sGroup = 'global', $sSection = 'payment/kroschke_debit', $sStoreCode = null)
    {
        if (!$sStoreCode) {
            $sStoreCode = $this->storeManager->getStore()->getCode();
        }
        $sPath = $sSection."/".$sKey;
        return $this->scopeConfig->getValue($sPath, ScopeInterface::SCOPE_STORE, $sStoreCode);
    }

    /**
     * Get a certain config param for all available stores
     *
     * @param  string $sKey
     * @param  string $sGroup
     * @param  string $sSection
     * @return array
     */
    public function getConfigParamAllStores($sKey, $sGroup = 'global', $sSection = 'payment/kroschke_debit')
    {
        $aValues = [];
        $aShopIds = $this->storeManager->getStores(false, true);
        foreach ($aShopIds as $sStoreCode => $oStore) {
            $sValue = $this->getConfigParam($sKey, $sGroup, $sSection, $sStoreCode);
            if (array_search($sValue, $aValues) === false) {
                $aValues[] = $sValue;
            }
        }
        return $aValues;
    }

    /**
     * Get parameter from the request
     *
     * @param  string $sParameter
     * @return mixed
     */
    public function getRequestParameter($sParameter)
    {
        return $this->_getRequest()->getParam($sParameter);
    }

    /**
     * Checks if the given value is json encoded
     *
     * @param  $sValue
     * @return bool
     */
    protected function isJson($sValue)
    {
        if (is_string($sValue) && is_array(json_decode($sValue, true)) && (json_last_error() == JSON_ERROR_NONE)) {
            return true;
        }
        return false;
    }

    /**
     * Handle the serialization of strings depending on the Magento version
     *
     * @param  mixed $mValue
     * @return string
     */
    public function serialize($mValue)
    {
//        if (version_compare($this->shopHelper->getMagentoVersion(), '2.2.0', '>=')) { // Magento 2.2.0 and above
//            return json_encode($mValue);
//        }
        return serialize($mValue);
    }

    /**
     * @param  string $sValue
     * @return mixed
     */
    public function unserialize($sValue)
    {
        if ($this->isJson($sValue)) {
            return json_decode($sValue, true);
        }
        return unserialize($sValue);
    }
}
