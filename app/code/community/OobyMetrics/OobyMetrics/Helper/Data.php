<?php
/**
 * oobyMetrics
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0), a
 * copy of which is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 *
 * @package    OobyMetrics_OobyMetrics
 * @author     oobyMetrics <code@oobymetrics.com>
 * @copyright  2017 oobyMetrics
 * @license    https://opensource.org/licenses/osl-3.0.php OSL 3.0
 */

class OobyMetrics_OobyMetrics_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * @var string
     */
    const XML_PATH_CONFIG_BASE = 'oobymetrics/config/';

    /**
     * @var int
     */
    const CONFIG_INTEGRATION_METHOD_AUTO            = 0;
    const CONFIG_INTEGRATION_METHOD_STANDALONE      = 10;
    const CONFIG_INTEGRATION_METHOD_GOOGLEANALYTICS = 20;

    /**
     * Is active
     * 
     * @param int $storeId
     * @return string
     */
    public function isActive($storeId = null) {
        return $this->getAccountCode($storeId) ? true : false;
    }

    /**
     * Get oobyMetrics account code
     *
     * @param int $storeId
     * @return string
     */
    public function getAccountCode($storeId = null) {
        return Mage::getStoreConfig(self::XML_PATH_CONFIG_BASE.'account_code', $storeId);
    }

    /**
     * Get integration method config - calculating 'auto' option
     *
     * @param int $storeId
     * @return int
     */
    public function getIntegrationMethod($storeId = null) {
        $method = (int)Mage::getStoreConfig(self::XML_PATH_CONFIG_BASE.'integration_method', $storeId);

        if($method === self::CONFIG_INTEGRATION_METHOD_AUTO) {
            if(Mage::helper('googleanalytics')->isGoogleAnalyticsAvailable($storeId)
                && Mage::helper('googleanalytics')->isUseUniversalAnalytics($storeId)) {
                $method = self::CONFIG_INTEGRATION_METHOD_GOOGLEANALYTICS;
            } else {
                $method = self::CONFIG_INTEGRATION_METHOD_STANDALONE;
            }
        }

        return $method;
    }

    /**
     *
     * @param int $storeId
     * @return bool
     */
    public function isGoogleAnalyticsIntegrationMethod($storeId = null) {
        return $this->isActive() && $this->getIntegrationMethod($storeId) === self::CONFIG_INTEGRATION_METHOD_GOOGLEANALYTICS;
    }

    /**
     *
     * @param int $storeId
     * @return bool
     */
    public function isStandaloneIntegrationMethod($storeId = null) {
        return $this->isActive() && $this->getIntegrationMethod($storeId) === self::CONFIG_INTEGRATION_METHOD_STANDALONE;
    }

}