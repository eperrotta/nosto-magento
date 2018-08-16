<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category  Nosto
 * @package   Nosto_Tagging
 * @author    Nosto Solutions Ltd <magento@nosto.com>
 * @copyright Copyright (c) 2013-2017 Nosto Solutions Ltd (http://www.nosto.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Nosto email block.
 * Used to render email widgets into email templates.
 *
 * @category Nosto
 * @package  Nosto_Tagging
 * @author   Nosto Solutions Ltd <magento@nosto.com>
 */
class Nosto_Tagging_Block_Email extends Mage_Core_Block_Template
{

    const DEFAULT_HEADER_TXT = "Recommended for you";
    const EMAIL_WIDGET_VERSION = '2.0.8';
    const DEFAULT_PRODUCT_AMOUNT = 4;

    /**
     * Render HTML placeholder element for the email widget if the
     * module is enabled for the current store.
     *
     * @return string
     */
    protected function _toHtml()
    {

        /** @var Nosto_Tagging_Helper_Account $helper */
        $helper = Mage::helper('nosto_tagging/account');
        if (
            !Mage::helper('nosto_tagging/module')->isModuleEnabled()
            || !$helper->existsAndIsConnected()
        ) {
            return '';
        }
        return '';
    }

    /**
     * Returns the nosto account name
     *
     * @return string|null
     */
    public function getNostoAccountName()
    {
        /** @var Nosto_Tagging_Helper_Account $accountHelper */
        $accountHelper = Mage::helper('nosto_tagging/account');
        $account = $accountHelper->find();
        if ($account instanceof \Nosto_Object_Signup_Account) {
            return $account->getName();
        }
        return null;
    }

    /**
     * Returns the recipient email address
     *
     * @return string|null
     */
    public function getRecipientEmailAddress()
    {
        $email = $this->getData('email');
        if ($email) {
            return $email;
        }
        return null;
    }

    /**
     * Returns the recommendation type
     *
     * @return string|null
     */
    public function getWidgetId()
    {
        $widgetId = $this->getData('widget_id');
        if ($widgetId) {
            return $widgetId;
        }
        return null;
    }

    /**
     * Returns the amount products to display in reco
     *
     * @return string|null
     */
    public function getProductAmount()
    {
        $amount = $this->getData('amount');
        if ($amount) {
            return $amount;
        }
        return self::DEFAULT_PRODUCT_AMOUNT;
    }

    /**
     * Returns the heading for the reco
     *
     * @return string|null
     */
    public function getHeading()
    {
        $heading = $this->getData('heading');
        if ($heading) {
            return $heading;
        }
        return self::DEFAULT_HEADER_TXT;
    }

}
