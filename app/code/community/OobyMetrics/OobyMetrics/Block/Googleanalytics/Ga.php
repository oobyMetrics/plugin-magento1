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

class OobyMetrics_OobyMetrics_Block_GoogleAnalytics_Ga extends Mage_GoogleAnalytics_Block_Ga {

    /**
     * Overriding _getPageTrackingCodeUniversal would be ideal, but this method
     * gives us the cleanest entry point.
     *
     * @return string
     */
    protected function _getAnonymizationCode() {
        $code = parent::_getAnonymizationCode();

        if($this->helper('googleanalytics')->isUseUniversalAnalytics() && $this->helper('oobymetrics')->isGoogleAnalyticsIntegrationMethod()) {
            $code .= ($code ? "\n" : "") . "ga('require', 'oobyMetrics');";
        }

        return $code;
    }
}
