<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
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
 * @category    design
 * @package     base_default
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
?>
<?php
/**
 * Top menu for store
 *
 * @see Mage_Page_Block_Html_Topmenu
 */
?>
<?php $_menu = $this->getHtml('level-top') ?>
<?php $instance = Mage::helper("ExtraConfig"); ?>
<?php $_menuSelected = false;
if (Mage::getSingleton('cms/page')->getIdentifier()) {
    $_menuSelected = Mage::getSingleton('cms/page')->getIdentifier();
}
?>
<?php if($_menu): ?>
    <div class="nav-container">
        <a class="toggleMenu" title="Menu" href="#"><span><?php echo $this->__('Menu') ?></span><span class="overlay-menu" style="display: inline;"></span></a>
        <ul id="nav">
            <?php
            $homeUrl = Mage::helper('core/url')->getHomeUrl();
            $rootUrl = str_replace("index.php/","",$homeUrl);
            $currentUrl = Mage::helper('core/url')->getCurrentUrl();
            $currentUrl = explode("?",$currentUrl);
            $currentUrl = $currentUrl[0];
            ?>
            <?php if($instance->getTS('menu/homelink')) :?>
                <li class="home <?php if ($currentUrl === $homeUrl || $currentUrl == $rootUrl):?> active<?php endif;?>"><a class="level-top" href="<?php echo $this->getUrl('')?>"><span class="homelink"><?php echo $this->__('Home') ?></span></a></li>
            <?php endif ?>
            <li class="level0 level-top <?php if ($_menuSelected === 'subscriptions') echo ' active'; ?>"><a class="level-top" href="<?php echo Mage::getUrl('subscriptions'); ?>"><span><?php echo $this->__('Subscription'); ?></span></a></li>
            <!-- <li class="level0 level-top <?php if ($_menuSelected === 'subscription') echo ' active'; ?>"><a href="<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK) . 'blades'; ?>" class="level-top" ><span>SUBSCRIPTION</span></a></li> -->
            <?php echo $_menu ?>
            <?php /* <li class="level0 level-top <?php if ($_menuSelected === 'products') echo ' active'; ?>"><a class="level-top" href="<?php echo Mage::getUrl('products'); ?>"><span><?php echo $this->__('MEN'); ?></span></a></li>
        <li class="level0 level-top <?php if ($_menuSelected === 'dorco-eve') echo ' active'; ?>"><a class="level-top" href="<?php echo Mage::getUrl('dorco-eve'); ?>"><span><?php echo $this->__('WOMEN'); ?></span></a></li>
        <!-- <li class="level0 level-top <?php if ($_menuSelected === 'offer-event') echo ' active'; ?>"><a class="level-top" href="<?php echo Mage::getUrl('offer-event'); ?>"><span><?php echo $this->__('OFFER'); ?></span></a></li>-->*/?>

            <li class="level0 level-top <?php if ($_menuSelected === 'offer-event') echo ' active'; ?>"><a href="<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK) . 'offer-event'; ?>" class="level-top" style="display: block;"><span>OFFERS</span></a></li>
            <li class="level0 level-top <?php if ($_menuSelected === 'community') echo ' active'; ?> last"><a href="<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK) . 'community'; ?>" class="level-top" ><span>COMMUNITY</span></a></li>
            <?php /* <li class="level0 level-top <?php if ($_menuSelected === 'Why Dorco?') echo ' active'; ?>"><a href="<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK) . 'why-dorco'; ?>" class="level-top" ><span>WHY DORCO&#63;</span></a></li>*/?>

        </ul>
    </div>
<?php endif ?>
