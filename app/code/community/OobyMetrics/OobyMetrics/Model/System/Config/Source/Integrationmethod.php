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

class OobyMetrics_OobyMetrics_Model_System_Config_Source_Integrationmethod {

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray() {
        return array(
            array(
                'value' => OobyMetrics_OobyMetrics_Helper_Data::CONFIG_INTEGRATION_METHOD_AUTO,
                'label' => Mage::helper('oobymetrics')->__('Automatic (recommended)')
            ),
            array(
                'value' => OobyMetrics_OobyMetrics_Helper_Data::CONFIG_INTEGRATION_METHOD_GOOGLEANALYTICS,
                'label' => Mage::helper('oobymetrics')->__('Google Universal Analytics')
            ),
            array(
                'value' => OobyMetrics_OobyMetrics_Helper_Data::CONFIG_INTEGRATION_METHOD_STANDALONE,
                'label' => Mage::helper('oobymetrics')->__('Standalone')
            )
        );
    }

}