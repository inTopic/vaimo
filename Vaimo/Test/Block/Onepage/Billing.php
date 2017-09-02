<?php

/**
 * Class Vaimo_Test_Block_Onepage_Billing
 * @author Voronov RA
 */
class Vaimo_Test_Block_Onepage_Billing extends Mage_Checkout_Block_Onepage_Billing
{
    protected function _construct()
    {
        parent::_construct();
    }

    /**
     * get postcodes list for checkout onepage
     * @author Voronov RA
     */
    public function getPostcodes()
    {
        /** @var Vaimo_Test_Model_Resource_Postcode_Collection $postcodesCollection */
        $postcodesCollection = Mage::getModel('vaimotest/postcode')->getCollection();
        return $postcodesCollection->getData();
    }
}